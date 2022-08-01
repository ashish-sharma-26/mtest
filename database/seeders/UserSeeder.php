<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Sample Lipsum Lorem',
            'email' => 'Lipsumsample123@gmail.com',
            'password' => bcrypt('vertika123456789'),
        ]);

    }
}
