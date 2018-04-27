<?php

use Illuminate\Database\Seeder;
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
        // $this->call(UsersTableSeeder::class);

        if(DB::table('users')->where('name', 'test')->count() == 0) {
            User::create([
                    'name' => 'test',
                    'email' => 'test@test.com',
                    'password' => bcrypt('qweasd'),
                    'remember_token' =>str_random(10),
                ]
            );
        }
    }
}
