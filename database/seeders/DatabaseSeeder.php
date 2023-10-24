<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Barang;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('kondisis')->insert(['nama' => 'Baik',]);
        DB::table('kondisis')->insert(['nama' => 'Layak',]);
        DB::table('kondisis')->insert(['nama' => 'Rusak',]);
        DB::table('jenis')->insert(['nama' => 'Laptop',]);
        DB::table('jenis')->insert(['nama' => 'Handphone',]);
        DB::table('jenis')->insert(['nama' => 'Earphone',]);
        DB::table('jenis')->insert(['nama' => 'Keyboard',]);
        DB::table('users')->insert(['name' => 'Razan', 'email' => 'razan@gmail.com', 'password' => Hash::make('12345678')]);
        Barang::factory(10)->create();
    }
}
