<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserPOS;
use App\Models\Level;
use Illuminate\Support\Facades\Hash;

class UserPOSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminLevel = Level::where('level_kode', 'ADM')->first();
        $kasirLevel = Level::where('level_kode', 'KSR')->first();
        $managerLevel = Level::where('level_kode', 'MNG')->first();

        $users = [
            [
                'level_id' => $adminLevel->level_id,
                'username' => 'admin',
                'nama'     => 'Administrator',
                'password' => Hash::make('password'),
            ],
            [
                'level_id' => $kasirLevel->level_id,
                'username' => 'kasir1',
                'nama'     => 'Budi Santoso',
                'password' => Hash::make('password'),
            ],
            [
                'level_id' => $managerLevel->level_id,
                'username' => 'manager',
                'nama'     => 'Siti Rahayu',
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($users as $user) {
            UserPOS::create($user);
        }
    }
}
