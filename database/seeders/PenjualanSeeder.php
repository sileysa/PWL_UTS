<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\UserPOS;
use App\Models\Barang;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kasir   = UserPOS::where('username', 'kasir1')->first();
        $barangs = Barang::all();

        for ($i = 1; $i <= 5; $i++) {
            $penjualan = Penjualan::create([
                'user_id'           => $kasir->user_id,
                'pembeli'           => 'Pelanggan ' . $i,
                'penjualan_kode'    => 'TRX-' . str_pad($i, 5, '0', STR_PAD_LEFT),
                'penjualan_tanggal' => now()->subDays(rand(1, 15)),
            ]);

            // Tambah 2-3 item per transaksi
            $items = $barangs->random(rand(2, 3));
            foreach ($items as $barang) {
                PenjualanDetail::create([
                    'penjualan_id' => $penjualan->penjualan_id,
                    'barang_id'    => $barang->barang_id,
                    'harga'        => $barang->harga_jual,
                    'jumlah'       => rand(1, 5),
                ]);
            }
        }
    }
}
