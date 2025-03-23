<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     *To insert data into the users table,
     *create a seed file instead. Seed files are
     *used to populate database with sample data for
     *testing or development purposes
     */
    public function run()
    {
        // User::factory(10)->create();

        User::create([
            'first_name' => 'Nurlia',
            'last_name' => 'Azrina',
            'mycard_number' => '240402120412',
            'phone_number' => '0177145819',
            'email' => 'nurlia@tabika.com',
            'password' => bcrypt('admin123'),
        ]);
    }
}
