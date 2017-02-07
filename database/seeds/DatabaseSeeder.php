<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,20) as $index) {
            //$user_id = $faker->unique()->randomNumber();
            $user_id = Uuid::generate(1);
            DB::table('users')->insert([
                'uuid' => $user_id,
                'name' => $faker->name,
                'email' => $faker->email,
                //'password' => bcrypt('secret'),
                'password' => "Password"
            ]);

            DB::table('posts')->insert([
                'id' => $faker->unique()->randomNumber(),
                'name' => $faker->name,
                'title' => $faker->email,
                'comment' => 'Comment',
                'user_uuid' => $user_id,
            ]);
        }
    }
}
