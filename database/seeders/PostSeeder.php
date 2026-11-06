<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Membuat 10 post, masing-masing dengan 1-5 komentar.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            $post = Post::create([
                'title' => $faker->sentence(4),
                'body' => $faker->paragraph(3),
            ]);

            // post_id otomatis diisi lewat relasi comments()
            $jumlahKomentar = $faker->numberBetween(1, 5);
            for ($j = 0; $j < $jumlahKomentar; $j++) {
                $post->comments()->create([
                    'body' => $faker->sentence(8),
                ]);
            }
        }
    }
}
