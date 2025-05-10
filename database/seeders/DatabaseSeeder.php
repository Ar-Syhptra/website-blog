<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Category::create([
        //     'name' => 'Web apps',
        //     'slug' => 'web-apps'
        // ]);

        // Post::create([
        //     'title' => 'Judul Artikel 1',
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'judul-artikel-1',
        //     'body' => 'Peran Factory di Laravel:
        //     Factory di Laravel (seperti PostFactory dan UserFactory) adalah alat untuk menghasilkan data dummy untuk model. Factory tidak hanya mengisi kolom dengan data acak, tetapi juga bisa membuat relasi antar model, seperti dalam kasus author_id.
        //     Ketika Anda  => User::factory() di PostFactory, Anda memerintahkan Laravel untuk:
        //     Membuat instance baru dari model User menggunakan UserFactory.
        //     Mengambil nilai id dari User yang dibuat tersebut untuk diisi ke kolom author_id di tabel posts.',
        // ]);

        $this->call([CategorySeeder::class, UserSeeder::class]);

        Post::factory(100)->recycle([
            Category::all(),
            User::all(),
        ])->create();
    }
}