<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'supplier_kode'   => 'SUP001',
                'supplier_nama'   => 'PT Indofood Sukses Makmur',
                'supplier_alamat' => 'Jl. Jend. Sudirman No.76, Jakarta Selatan',
            ],
            [
                'supplier_kode'   => 'SUP002',
                'supplier_nama'   => 'CV Sumber Rejeki',
                'supplier_alamat' => 'Jl. Pahlawan No.12, Surabaya',
            ],
            [
                'supplier_kode'   => 'SUP003',
                'supplier_nama'   => 'PT Unilever Indonesia',
                'supplier_alamat' => 'Jl. BSD Boulevard Barat, Tangerang',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
