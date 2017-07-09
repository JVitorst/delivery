<?php

use Illuminate\Database\Seeder;
use delivery\Models\Cupom;
use delivery\Models\Product;
use delivery\Models\Category;


class CupomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cupom::class, 10)->create();

    }
}
