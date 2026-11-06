<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('id_ID');
        for($i=0;$i<20;$i++){
            DB::table('barangs')->insert([
                    'nama_barang' => $faker->name,
                    'deskripsi' => $faker->company,
                    'harga' => $faker->numberBetween(125000, 350000),
                    'stok' => $faker->numberBetween(5, 100)
                
            ]);
        }
    }
}
