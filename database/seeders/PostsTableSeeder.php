<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('posts')->insert([
        //     'title' => 'My Secondy Post',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'slug' => 'my-secondy-post',
        //     'thumbnail' => 'https://via.placeholder.com/150',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s'),
        // ]);

        // estamos gerando na base 5 posts fakes via factory
        \App\Models\Post::factory()->count(5)->create(); // published is false

        // Gerando mais 10 posts na base, mas agora com o published como true

        \App\Models\Post::factory()->count(10)->published()->create();
    }
}
