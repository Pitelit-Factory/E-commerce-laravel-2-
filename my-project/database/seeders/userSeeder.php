<?php

namespace Database\Seeders;

use \Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 5; $i++){
            DB::table('users')->insert(
                ['name' => fake()->firstName(),
                    'email' => $faker->safeEmail(),
                    'password' => Hash::make(1234),
                    'phone' => $faker->phoneNumber(),
                    'adresse' => $faker->address(),
                    'nbCommande' =>0,
                    'Role' => rand(0,1)
            ]);
        }
    }
}
