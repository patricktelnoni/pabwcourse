<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('id_ID');
        for($i=0;$i<10;$i++){
            DB::table('produks')->insert([
                    'nama_produk' => $faker->name,
                    'deskripsi' => $faker->company,
                    'harga' => $faker->numberBetween(325000, 850000),
                    'stok' =>  $faker->numberBetween(5, 100)  
            ]);
        }
        
    }
}
