<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->desc = 'Iphone 12';
        $product->price = '123333';
        $product->save();

        $product = new Product();
        $product->desc = 'Iphone 11';
        $product->price = '232323';
        $product->save();


    }
}
