<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	$faker = Faker\Factory::create();
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

    	DB::table('users')->insert([
    		'name' => 'admin',
    		'email' => 'admin'.'@gmail.com',
    		'password' => bcrypt('password'),
    	]);

    	DB::table('users')->insert([
    		'name' => 'user',
    		'email' => 'user'.'@gmail.com',
    		'password' => bcrypt('password'),
    	]);

    	$users = User::all();

    	foreach ($users as $user) {
    		for ($i=0; $i < 10; $i++) { 
    			Post::create([
    				'titol' => $faker->sentence(6), 'contingut' => $faker->paragraphs(4), 'user_id' => $user->id,]);
    		}
    	}

    }
}
