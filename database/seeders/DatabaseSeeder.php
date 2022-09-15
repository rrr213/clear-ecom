<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\produk;
use App\Models\kategori;
use App\Models\user;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name'=>'admin',
            'email'=>'aa@aa.com',
            'password'=>bcrypt('1'),
            'role'=>'admin'
        ]);
        User::create([
            'name'=>'Budi Sudarsono',
            'email'=>'aaa@aaa.com',
            'password'=>bcrypt('1'),
            'role'=>'customer'
        ]);
        $kategori=kategori::create([
            'name'=>'makanan'
        ]);
        $kategori=kategori::create([
            'name'=>'minuman'
        ]);
        $kategori=kategori::create([
            'name'=>'aksesoris'
        ]);

        produk::create([
            'kategori_id'=>1,
            'name'=>'Apple Pro 2',
            'harga'=>200000,
            'foto'=> 'images/terlaris 1.jpg'
        ]);
            produk::create([
            'kategori_id'=>1,
            'name'=>'Apple Pro 12',
            'harga'=>300000,
            'foto'=> 'images/terlaris 2.jpg'
        ]);
             produk::create([
            'kategori_id'=>2,
            'name'=>'Apple Watch',
            'harga'=>400000,
            'foto'=> 'images/terlaris 3.jpg'
        ]);
            produk::create([
            'kategori_id'=>2,
            'name'=>'Apple Pen',
            'harga'=>500000,
            'foto'=> 'images/terlaris 4.jpg'
        ]);
            produk::create([
            'kategori_id'=>3,
            'name'=>'Apple Mini',
            'harga'=>600000,
            'foto'=> 'images/terlaris 5.png'
        ]);
    }
}
