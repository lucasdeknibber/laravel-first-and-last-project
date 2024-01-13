<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = Post::create([
            'title' => 'Test Post',
            'message' => 'This is a test post!',
            'user_id' => 1,
            'cover_image' => '',
        ]);
        // 'title',
        // 'message',
        // 'user_id',
        // 'cover_image',
    }
}
