<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
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
        $users = User::all();
        
        foreach ($users as $user){
            for ($i = 0; $i < 10; $i++) {
                Post::create([
                    'titol' => $faker->sentence(4),
                    'contingut' => $faker->text($faker->randomNumber(4)),
                    'user_id' => $user->id
                ]);
            }
        }
    }
}
