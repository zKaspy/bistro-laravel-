<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 10; $i++) 
            \Illuminate\Support\Facades\DB::table('products')->insert([
                'title' => 'Барбекю',
                'price' => rand(200, 700),
                'desc' => 'Курица, бекон, моцарелла, томатный соус, соус барбекю, лук',
                'weight' => rand(700, 1200)
            ]);
    }
}
