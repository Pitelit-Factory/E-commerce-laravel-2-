<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class produitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produit')->insert([
            ['nom' => 'Mix Pina Colada', 'prix' => 10.00, 'volume' => 5, 'poids' => 5, 'type' => 2],
            ['nom' => 'Corn Kernels - Frozen', 'prix' => 73.17, 'volume' => 3, 'poids' => 3, 'type' => 2],
            ['nom' => 'Sobe - Berry Energy', 'prix' => 17.43, 'volume' => 10, 'poids' => 7, 'type' => 2],
            ['nom' => 'Juice - Clam, 46 Oz', 'prix' => 91.54, 'volume' => 5, 'poids' => 19, 'type' => 1],
            ['nom' => 'Crab - Claws, Snow 16 - 24', 'prix' => 5.63, 'volume' => 4, 'poids' => 12, 'type' => 3],
        ]);
    }
}
