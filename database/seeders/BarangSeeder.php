<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;
use App\Models\Kategori;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $makanan   = Kategori::where('kategori_kode', 'MKN')->first();
        $minuman   = Kategori::where('kategori_kode', 'MNM')->first();
        $snack     = Kategori::where('kategori_kode', 'STK')->first();
        $kebersihan = Kategori::where('kategori_kode', 'SBN')->first();

        $barangs = [
            ['kategori_id' => $makanan->kategori_id,    'barang_kode' => 'BRG001', 'barang_nama' => 'Indomie Goreng',         'harga_beli' => 2500,  'harga_jual' => 3500],
            ['kategori_id' => $makanan->kategori_id,    'barang_kode' => 'BRG002', 'barang_nama' => 'Indomie Kuah Ayam',      'harga_beli' => 2500,  'harga_jual' => 3500],
            ['kategori_id' => $minuman->kategori_id,    'barang_kode' => 'BRG003', 'barang_nama' => 'Aqua 600ml',             'harga_beli' => 2000,  'harga_jual' => 3000],
            ['kategori_id' => $minuman->kategori_id,    'barang_kode' => 'BRG004', 'barang_nama' => 'Teh Botol Sosro 500ml',  'harga_beli' => 3500,  'harga_jual' => 5000],
            ['kategori_id' => $snack->kategori_id,      'barang_kode' => 'BRG005', 'barang_nama' => 'Chitato Original 68g',   'harga_beli' => 8000,  'harga_jual' => 11000],
            ['kategori_id' => $snack->kategori_id,      'barang_kode' => 'BRG006', 'barang_nama' => 'Oreo Sandwich Coklat',   'harga_beli' => 4500,  'harga_jual' => 6500],
            ['kategori_id' => $kebersihan->kategori_id, 'barang_kode' => 'BRG007', 'barang_nama' => 'Sabun Lifebuoy 110g',    'harga_beli' => 5000,  'harga_jual' => 7000],
            ['kategori_id' => $kebersihan->kategori_id, 'barang_kode' => 'BRG008', 'barang_nama' => 'Shampo Sunsilk 170ml',   'harga_beli' => 15000, 'harga_jual' => 20000],
        ];

        foreach ($barangs as $barang) {
            Barang::create($barang);
        }
    }
}
