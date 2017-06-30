<?php

namespace delivery\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      /*Toda vez que ao chamar uma interface Repository Abstrata,o Laravel
       * irá instanciar o do Eloquent (implentação concreta) */
       $this->app->bind(
         'delivery\Repositories\CategoryRepository',
         'delivery\Repositories\CategoryRepositoryEloquent'
       );
       $this->app->bind(
         'delivery\Repositories\ClientRepository',
         'delivery\Repositories\ClientRepositoryEloquent'
       );
       $this->app->bind(
         'delivery\Repositories\OrderItemRepository',
         'delivery\Repositories\OrderItemRepositoryEloquent'
       );
       $this->app->bind(
         'delivery\Repositories\OrderRepository',
         'delivery\Repositories\OrderRepositoryEloquent'
       );
       $this->app->bind(
         'delivery\Repositories\ProductRepository',
         'delivery\Repositories\ProductRepositoryEloquent'
       );
       $this->app->bind(
         'delivery\Repositories\UserRepository',
         'delivery\Repositories\UserRepositoryEloquent'
       );

    }
}
