<?php

namespace Database\Seeders;

use App\Models\Parameters;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
//      ONE PRODUCT SEED

        $product = Product::create([
            'name_ru' => 'Катанка АМФу 20 ТУ 24.44.23-009-11006106-2021',
            'name_en' => 'Катанка АМФу 20 ТУ 24.44.23-009-11006106-2021',
            'name_uz' => 'Катанка АМФу 20 ТУ 24.44.23-009-11006106-2021',
            'name_tr' => 'Катанка АМФу 20 ТУ 24.44.23-009-11006106-2021',
            'description_ru' => 'кг',
            'description_en' => 'kg',
            'description_uz' => 'kg',
            'description_tr' => 'kg',
            'category_id' => 3,
        ]);
        Parameters::create([
            'value' =>'20.0',
            'product_id' => $product->id,
            'attribute_id' => 21,
        ]);
        Parameters::create([
            'value' =>'Upcast®',
            'product_id' => $product->id,
            'attribute_id' => 22,
        ]);

        $product = Product::create([
            'name_ru' => 'Катанка АМФу 25 ТУ 24.44.23-009-11006106-2021',
            'name_en' => 'Катанка АМФу 25 ТУ 24.44.23-009-11006106-2021',
            'name_uz' => 'Катанка АМФу 25 ТУ 24.44.23-009-11006106-2021',
            'name_tr' => 'Катанка АМФу 25 ТУ 24.44.23-009-11006106-2021',
            'description_ru' => 'кг',
            'description_en' => 'kg',
            'description_uz' => 'kg',
            'description_tr' => 'kg',
            'category_id' => 3,
        ]);
        Parameters::create([
            'value' =>'25.0',
            'product_id' => $product->id,
            'attribute_id' => 21,
        ]);
        Parameters::create([
            'value' =>'Upcast®',
            'product_id' => $product->id,
            'attribute_id' => 22,
        ]);



//      END ONE PRODUCT SEED
    }
}
