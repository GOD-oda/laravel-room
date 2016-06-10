<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\DataAccess\Eloquent\Article;
use Illuminate\Database\Eloquent\Model;

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
        $this->call(ArticleTableSeeder::class);
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

class ArticleTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i < 22; $i++) {
            Article::create([
                'title' => 'test-title'.$i,
                'body' => 'test-body'.$i,
                'discription' => 'test-discription'.$i,
                'published_at' => Carbon::now(),
                'user_id' => 1,
                'uri' => 'test-uri-'.$i
            ]);
        }
    }
}