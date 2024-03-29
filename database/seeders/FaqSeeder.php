<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FaqItem;
use App\Models\FaqCategory;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = FaqCategory::create([
            'name' => 'General',
        ]);

        FaqItem::create([
            'question' => 'What is the meaning of life?',
            'answer' => '42',
            'faq_category_id' => $category->id,
        ]);

        FaqItem::create([
            'question' => 'What is the answer to the ultimate question of life, the universe, and everything?',
            'answer' => '42',
            'faq_category_id' => $category->id,
        ]);

        $category = FaqCategory::create([
            'name' => 'Technical',
        ]);

        FaqItem::create([
            'question' => 'What is the meaning of life?',
            'answer' => '42',
            'faq_category_id' => $category->id,
        ]);

        FaqItem::create([
            'question' => 'What is the answer to the ultimate question of life, the universe, and everything?',
            'answer' => '42',
            'faq_category_id' => $category->id,
        ]);
    }
}
// use App\Models\User;

// class AdminSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         $user = User::create([
//             'name' => 'admin',
//             'email' => 'admin@ehb.be',
//             'password' => bcrypt('Password!321'),
//             'birthday' => '1999-01-01',
//             'bio' => 'I am an admin user!',
//             'avatar' => '',
//             'is_admin' => true,
//         ]);
//         // 'name',
//         // 'email',
//         // 'password',
//         // 'birthday',
//         // 'bio',
//         // 'avatar',
//     }
// }