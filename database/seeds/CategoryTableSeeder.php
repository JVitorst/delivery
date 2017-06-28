<?php

use Illuminate\Database\Seeder;
use delivery\Models\Product;
use delivery\Models\Category;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //each() = para cada categoria, crie 5 produtos relacionados
        factory(Category::class , 10)->create()->each(function ($c){
            for ($i=0; $i < 5 ; $i++) {
            // contruindo objeto, o salvamento é feito pelo save()
              $c->products()->save(factory(Product::class)->make());
        }

      });

    }
}
