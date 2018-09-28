<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImages;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Haciendo uso de Factory aleatoriamente
        /*
        factory(Category::class,5)->create();
        factory(Product::class,100)->create();
        factory(ProductImages::class,200)->create();
        */

        //Haciendo uso de Factories con relaciones en modelos
        //con esto nos aseguramos que cada categoria tenga 20 productos
        //y que cada producto tenga 2 imagenes
        //al agregar varios productos e images se usa saveMany en lugar de save

        $categories=factory(Category::class,5)->create();
        $categories->each(function ($category){
            $products=factory(Product::class,20)->make();
            $category->products()->saveMany($products);

            $products->each(function ($product){
                $images=factory(ProductImages::class,5)->make();
                $product->images()->saveMany($images);
            });
        });
    }
}
