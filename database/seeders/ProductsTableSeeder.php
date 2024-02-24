<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(45)->create();
    }



}
