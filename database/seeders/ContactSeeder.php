<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contact = Contact::create([
            'name' => 'Test Contact',
            'email' => 'test@localhost',
            'message' => 'This is a test contact!',
        ]);
        
        // 'email',
        // 'message',
    }
}
