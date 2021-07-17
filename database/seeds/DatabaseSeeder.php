<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('blogs')->insert([
                'user_id' => User::all()->random()->id,
                'name' => $faker->name,
                'description' => $faker->paragraph
	        ]);
	}
    }    
}
