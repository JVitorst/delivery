<?php

use Illuminate\Database\Seeder;
use delivery\Models\Product;
use delivery\Models\Order;
use delivery\Models\OrderItem;


class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //each() = para cada pedido criar 2 items
        factory(Order::class , 10)->create()->each(function ($o){
            for ($i=0; $i < 2 ; $i++) {
            // contruindo objeto, e escolhendo os produtos que compoe o pedido
              $o->item()->save(factory(OrderItem::class)->make([
                  'product_id' => rand( 1,5),
                  'qtd' => 2,
                  'price' => 50
              ]));
        }

      });

    }
}
