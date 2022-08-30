<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Burhan Mafazi',
            'nomor_induk' => '216105',
            'email' => 'burhanburdev@gmail.com',
            'password' => Hash::make('password123')
        ]);

        $admin->assignRole('admin');

        $parent = User::create([
            'name' => 'Meredita Susanty',
            'nomor_induk' => '116020',
            'email' => 'orangtua@gmail.com',
            'password' => Hash::make('password123')
        ]);

        $parent->assignRole('orang_tua');

        $teacher = User::create([
            'name' => 'Ade Irawan',
            'nomor_induk' => '116130',
            'email' => 'guru@gmail.com',
            'password' => Hash::make('password123')
        ]);

        $teacher->assignRole('guru');

        $student = User::create([
            'name' => 'Bayu Wicaksono',
            'nomor_induk' => '219059',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('password123')
        ]);

        $student->assignRole('siswa');
    }
}
