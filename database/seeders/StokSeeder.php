<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stok;
use App\Models\Supplier;
use App\Models\Barang;
use App\Models\UserPOS;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplier1 = Supplier::where('supplier_kode', 'SUP001')->first();
        $supplier3 = Supplier::where('supplier_kode', 'SUP003')->first();
        $user      = UserPOS::where('username', 'admin')->first();
        $barangs   = Barang::all();

        foreach ($barangs as $index => $barang) {
            Stok::create([
                'supplier_id'  => ($index % 2 == 0) ? $supplier1->supplier_id : $supplier3->supplier_id,
                'barang_id'    => $barang->barang_id,
                'user_id'      => $user->user_id,
                'stok_tanggal' => now()->subDays(rand(1, 30)),
                'stok_jumlah'  => rand(50, 200),
            ]);
        }
    }
}
