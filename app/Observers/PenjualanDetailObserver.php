<?php

namespace App\Observers;

use App\Models\Stok;
use App\Models\PenjualanDetail;

class PenjualanDetailObserver
{
    /**
     * Saat detail penjualan dibuat → kurangi stok
     */
    public function created(PenjualanDetail $detail): void
    {
        $this->kurangiStok($detail->barang_id, $detail->jumlah);
    }

    /**
     * Saat detail penjualan diupdate → kembalikan stok lama, kurangi stok baru
     */
    public function updated(PenjualanDetail $detail): void
    {
        $jumlahLama = $detail->getOriginal('jumlah');
        $barangLama = $detail->getOriginal('barang_id');
        $jumlahBaru = $detail->jumlah;
        $barangBaru = $detail->barang_id;

        // Kembalikan stok lama
        $this->tambahStok($barangLama, $jumlahLama);

        // Kurangi stok baru
        $this->kurangiStok($barangBaru, $jumlahBaru);
    }

    /**
     * Saat detail penjualan dihapus → kembalikan stok
     */
    public function deleted(PenjualanDetail $detail): void
    {
        $this->tambahStok($detail->barang_id, $detail->jumlah);
    }

    // ──────────────────────────────────────────
    // Helper
    // ──────────────────────────────────────────

    private function kurangiStok(int $barangId, int $jumlah): void
    {
        // Ambil total stok yang tersedia untuk barang ini
        $totalStok = Stok::where('barang_id', $barangId)->sum('stok_jumlah');

        if ($totalStok < $jumlah) {
            throw new \Exception("Stok tidak mencukupi! Stok tersedia: {$totalStok}");
        }

        // Kurangi dari stok terbaru (FIFO: stok terlama dikurangi duluan)
        $stoks = Stok::where('barang_id', $barangId)
            ->where('stok_jumlah', '>', 0)
            ->orderBy('stok_tanggal', 'asc')
            ->get();

        $sisaKurang = $jumlah;

        foreach ($stoks as $stok) {
            if ($sisaKurang <= 0) break;

            if ($stok->stok_jumlah >= $sisaKurang) {
                $stok->decrement('stok_jumlah', $sisaKurang);
                $sisaKurang = 0;
            } else {
                $sisaKurang -= $stok->stok_jumlah;
                $stok->update(['stok_jumlah' => 0]);
            }
        }
    }

    private function tambahStok(int $barangId, int $jumlah): void
    {
        // Tambahkan ke stok terbaru
        $stok = Stok::where('barang_id', $barangId)
            ->orderBy('stok_tanggal', 'desc')
            ->first();

        if ($stok) {
            $stok->increment('stok_jumlah', $jumlah);
        }
    }
}