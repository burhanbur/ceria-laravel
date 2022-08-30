<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guard = 'web';

        $admin = Role::create([
            'id' => 1, 
            'name' => 'admin', 
            'guard_name' => $guard
        ]);

        $parent = Role::create([
            'id' => 2, 
            'name' => 'orang_tua', 
            'guard_name' => $guard
        ]);

        $teacher = Role::create([
            'id' => 3, 
            'name' => 'guru', 
            'guard_name' => $guard
        ]);

        $student = Role::create([
            'id' => 4, 
            'name' => 'siswa', 
            'guard_name' => $guard
        ]);
    }
}
