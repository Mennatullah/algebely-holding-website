<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('Pass@123456'),
        ]);
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
