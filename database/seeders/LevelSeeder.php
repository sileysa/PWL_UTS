<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            ['level_kode' => 'ADM', 'level_nama' => 'Administrator'],
            ['level_kode' => 'KSR', 'level_nama' => 'Kasir'],
            ['level_kode' => 'MNG', 'level_nama' => 'Manager'],
        ];

        foreach ($levels as $level) {
            Level::create($level);
        }
    }
}
