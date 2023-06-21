<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dodać do tabeli permissions rekordy z uprawnieniami
        DB::table('permissions')->insert([
            ['level' => 0, 'description' => 'User'],
            ['level' => 1, 'description' => 'Admin'],
            ['level' => 2, 'description' => 'Operator'],
        ]);
    }
}
