<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Str;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fnames = ["佐藤", "鈴木", "高橋", "田中"];
        $gnames = ["太郎", "次郎", "花子"];
        
       // 注意 シングルクオーテーションで囲んだ文字列の中で変数を記述しても変数展開は行われません
        
        for($i = 1; $i <= 10; $i++) {
            DB::table('people')->insert([
                'name' => "{$fnames[$i % 4]}" . " " . "{$gnames[$i % 3]}" ,
                'mail' => 'aaa' . $i . '@example.com',
                // 'password' => Hash::make('password'. $i),
                'age' => $i * $i ,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }
        
        
        
        for($i = 1; $i <= 10; $i++) {
            DB::table('people')->insert([
                'name' =>'テストユーザー' . $i,
                'mail' => 'bbb' .$i . '@example.com',
                // 'password' => Hash::make('password'),
                'age' => $i * $i + 3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }
        
         for($i = 1; $i <= 30; $i++) {
            DB::table('people')->insert([
                'name' => Str::random(10),
                'mail' => Str::random(10) . '@example.com',
                // 'password' => Hash::make('password'),
                'age' => $i + 20 ,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }
    }
}
