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
        $body = "<h2>Eloquentモデル</h2><p>まずEloquentモデルですが、ファイルは前回作成済みですね。app/Task.phpを見ましょう。 名前空間やクラスが定義されただけの、中身が空のクラスです。ぶっちゃけ、これだけでも動きます。なぜなら、Modelクラスを継承しているからです。</p>";
        for ($i = 1; $i < 22; $i++) {
            Article::create([
                'title' => "【Laravel5.1 チュートリアル】初心者向けタスクリスト第{$i}回",
                'body' => $body,
                'discription' => '今回は、ビューの作成とBladeディレクティブについての解説です。',
                'published_at' => Carbon::now(),
                'user_id' => 1,
                'uri' => 'test-uri-'.$i
            ]);
        }
    }
}