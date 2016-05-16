<?php

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
    }
}

class UserTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'conpw3',
            'password' => bcrypt('saowjhb3'),
            'user_id' => 1
        ]);
    }

}