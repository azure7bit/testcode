<?php

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
        //
        DB::table('products')->insert([
            'name' => 'Xbox One - Turtle Beach X-40 Headset',
            'purchasing_price'        =>  20,
            'selling_price'        =>  29.89,
            'category_id'  => 2,
            'store_id' => 1,
            'qty' => 30,
            'description' => 'description here',
            'product_sku' => 123436
        ]);

        DB::table('products')->insert([
            'name' => 'Xbox One - Elite Controller',
            'purchasing_price'        =>  20,
            'selling_price'        =>  29.89,
            'category_id'  => 2,
            'store_id' => 1,
            'qty' => 30,
            'description' => 'description here',
            'product_sku' => 123431
        ]);

        DB::table('products')->insert([
            'name' => 'Means Levi Jeans - Dark Blue',
            'purchasing_price'        =>  20,
            'selling_price'        =>  29.89,
            'category_id'  => 5,
            'store_id' => 1,
            'qty' => 30,
            'description' => 'description here',
            'product_sku' => 123434
        ]);

        DB::table('products')->insert([
            'name' => 'Means Levi Jeans - Dark Blue',
            'purchasing_price'        =>  20,
            'selling_price'        =>  29.89,
            'category_id'  => 5,
            'store_id' => 1,
            'qty' => 30,
            'description' => 'description here',
            'product_sku' => 123434
        ]);
    }
}
