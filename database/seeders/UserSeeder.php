<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'a@gmail.com',
                'email' => 'a@gmail.com',
                'email_verified_at' => '2025-02-02 00:00:00',
                'password' => bcrypt('1'),
                'remember_token' => Str::random(60),
                'created_at' => '2025-01-01 00:00:00',
                'updated_at' => '2025-01-01 00:00:00',
            ],
            [
                'name' => 'kadin',
                'email' => 'kadin@e.c',
                'email_verified_at' => '2025-02-02 00:00:00',
                'password' => bcrypt('1'),
                'remember_token' => Str::random(60),
                'created_at' => '2025-01-01 00:00:00',
                'updated_at' => '2025-01-01 00:00:00',
            ],
            [
                'name' => 'Sekdin',
                'email' => 'sekdin@e.c',
                'email_verified_at' => '2025-02-02 00:00:00',
                'password' => bcrypt('1'),
                'remember_token' => Str::random(60),
                'created_at' => '2025-01-01 00:00:00',
                'updated_at' => '2025-01-01 00:00:00',
            ],
            [
                'name' => 'Petugas',
                'email' => 'petugas@e.c',
                'email_verified_at' => '2025-02-02 00:00:00',
                'password' => bcrypt('1'),
                'remember_token' => Str::random(60),
                'created_at' => '2025-01-01 00:00:00',
                'updated_at' => '2025-01-01 00:00:00',
            ],
            [
                'name' => 'Bagian keuangan',
                'email' => 'keuangan@e.c',
                'email_verified_at' => '2025-02-02 00:00:00',
                'password' => bcrypt('1'),
                'remember_token' => Str::random(60),
                'created_at' => '2025-01-01 00:00:00',
                'updated_at' => '2025-01-01 00:00:00',
            ],
            [
                'name' => 'Pemohon kegiatan',
                'email' => 'pemohon@e.c',
                'email_verified_at' => '2025-02-02 00:00:00',
                'password' => bcrypt('1'),
                'remember_token' => Str::random(60),
                'created_at' => '2025-01-01 00:00:00',
                'updated_at' => '2025-01-01 00:00:00',
            ],
            [
                'name' => 'Peserta kegiatan',
                'email' => 'peserta@e.c',
                'email_verified_at' => '2025-02-02 00:00:00',
                'password' => bcrypt('1'),
                'remember_token' => Str::random(60),
                'created_at' => '2025-01-01 00:00:00',
                'updated_at' => '2025-01-01 00:00:00',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
