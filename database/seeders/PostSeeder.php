<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::get();
        foreach($users as $user)
        {
            for($i=1;$i<=10;$i++)
            {
                Post::create([
                    'title' => Str::random(10),
                    'user_id' => $user->id,
                ]);
            }
            
        }
        // Post::create([
        //     'title' => 'Lorem Lipsum',
        //     'user_id' => 1,
        // ]);
    }
}
