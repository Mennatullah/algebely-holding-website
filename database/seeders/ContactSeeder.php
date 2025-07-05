<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'type' => 'grow_with_us',
            'name' => 'Grow man',
            'phone' => '01000000000',
            'email' => 'test@example.com',
            'message' => 'Please check my CV',
            'cv' => 'images/pages/1751481576-porto46-product14-1-300x300.jpg',
            'is_active' => 1,
        ]);
        Contact::create([
            'type' => 'contact_us',
            'name' => 'Contact man',
            'phone' => '01000000252000',
            'email' => 'test2@example2.com',
            'message' => 'Please check my message',
            'cv' => null,
            'is_active' => 1,
        ]);
    }
}
