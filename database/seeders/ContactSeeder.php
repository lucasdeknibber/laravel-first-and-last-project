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
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'message' => 'This is a test contact!',
        ]);

        $contact = Contact::create([
            'name' => 'John Doe',
            'email' => 'johndoe@email.example',
            'message' => 'This is a test contact!',
        ]);
        
    }
}
