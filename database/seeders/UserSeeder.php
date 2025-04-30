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
                'name' => 'admin',
                'email' => 'a@gmail.com',
                'email_verified_at' => '2025-02-02 00:00:01',
                'password' => bcrypt('S2T24K30simoli'),
                'remember_token' => Str::random(60),
                'created_at' => '2025-01-01 00:00:02',
                'updated_at' => '2025-01-01 00:00:03',
            ],
            [
                'name' => 'kadin',
                'email' => 'kadin@e.c',
                'email_verified_at' => '2025-02-02 00:00:04',
                'password' => bcrypt('S2T24K30simoli'),
                'remember_token' => Str::random(60),
                'created_at' => '2025-01-01 00:00:05',
                'updated_at' => '2025-01-01 00:00:06',
            ],
            [
                'name' => 'Sekdin',
                'email' => 'sekdin@e.c',
                'email_verified_at' => '2025-02-02 00:00:07',
                'password' => bcrypt('S2T24K30simoli'),
                'remember_token' => Str::random(60),
                'created_at' => '2025-01-01 00:00:08',
                'updated_at' => '2025-01-01 00:00:09',
            ],
            [
                'name' => 'Petugas',
                'email' => 'petugas@e.c',
                'email_verified_at' => '2025-02-02 00:00:10',
                'password' => bcrypt('S2T24K30simoli'),
                'remember_token' => Str::random(60),
                'created_at' => '2025-01-01 00:00:11',
                'updated_at' => '2025-01-01 00:00:12',
            ],
            [
                'name' => 'Bagian keuangan',
                'email' => 'keuangan@e.c',
                'email_verified_at' => '2025-02-02 00:00:13',
                'password' => bcrypt('S2T24K30simoli'),
                'remember_token' => Str::random(60),
                'created_at' => '2025-01-01 00:00:14',
                'updated_at' => '2025-01-01 00:00:15',
            ],
            [
                'name' => 'Pemohon kegiatan',
                'email' => 'pemohon@e.c',
                'email_verified_at' => '2025-02-02 00:00:00',
                'password' => bcrypt('S2T24K30simoli'),
                'remember_token' => Str::random(60),
                'created_at' => '2025-01-01 00:00:16',
                'updated_at' => '2025-01-01 00:00:17',
            ],
            [
                'name' => 'Peserta kegiatan',
                'email' => 'peserta@e.c',
                'email_verified_at' => '2025-02-02 00:00:18',
                'password' => bcrypt('S2T24K30simoli'),
                'remember_token' => Str::random(60),
                'created_at' => '2025-01-01 00:00:19',
                'updated_at' => '2025-01-01 00:00:20',
            ],
            [
                'name' => 'Pemohon',
                'email' => 'uji.pemohon@gmail.com',
                'email_verified_at' => '2025-02-02 00:00:21',
                'password' => bcrypt('password'),
                'remember_token' => Str::random(60),
                'created_at' => '2025-01-01 00:00:22',
                'updated_at' => '2025-01-01 00:00:23',
            ],
            [
                'name' => 'Peserta',
                'email' => 'uji.peserta@gmail.com',
                'email_verified_at' => '2025-02-02 00:00:24',
                'password' => bcrypt('password'),
                'remember_token' => Str::random(60),
                'created_at' => '2025-01-01 00:00:25',
                'updated_at' => '2025-01-01 00:00:26',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
