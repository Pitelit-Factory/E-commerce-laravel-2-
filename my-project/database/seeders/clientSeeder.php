<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class clientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client')->insert([
            ['nom'=> 'Lempereur', 'prenom' => 'Julien', 'Email' => 'test@mail.com', 'mdp' => '123'],
            ['nom'=> 'Hakim', 'prenom' => 'omiri', 'Email' => 'test2@mail.com', 'mdp' => '123'],
            ['nom'=> 'Ali', 'prenom' => 'John', 'Email' => 'test3@com.com', 'mdp' => '123'],
            ['nom'=> 'samuel', 'prenom' => 'jonathan', 'Email' => 'test3@com.com', 'mdp' => '123'],
            ['nom'=> 'simon', 'prenom' => 'theo', 'Email' => 'test4@com.com', 'mdp' =>'123'],
        ]);
    }
}
