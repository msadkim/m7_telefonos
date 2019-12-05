<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        
       
        $posts = Post::all();
        
        foreach ($posts as $post) {
            $numActicles = rand(1,5);
            for ($i = 0; $i < $numActicles; $i++) {
                Comment::create([
                    'contingut' => $faker->word,
                    'post_id' => $post->id,
                    'user_id' => 1
                ]);
            }
        }
    }
}
