<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Str;

class CommentSeeder extends Seeder
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
        $posts = Post::get();
        foreach($users as $user)
        {
            foreach($posts as $post)
            {
                for($i=1;$i<=10;$i++)
                {
                    Comment::create([
                        'title' => Str::random(10),
                        'user_id' => $user->id,
                    ]);
                }
            }
        }
    }
}
