<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin','middleware' => 'auth.checkrole', 'as' => 'admin.'], function () {

    Route::group(['as' => 'categories.'], function () {
    /* Rotas da Categoria*/
        Route::get('categories', ['as' => 'index','uses' => 'CategoriesController@index' ]);
        Route::get('categories/create', ['as' => 'create','uses' => 'CategoriesController@create' ]);
        Route::get('categories/edit/{id}', ['as' => 'edit','uses' => 'CategoriesController@edit' ]);
        Route::post('categories/update/{id}', ['as' => 'update','uses' => 'CategoriesController@update' ]);
        Route::post('categories/store', ['as' => 'store','uses' => 'CategoriesController@store' ]);
    /* Fim das Rotas da Categoria*/
    });

    Route::group(['as' => 'products.'], function () {
      /* Rotas do Produto*/
      Route::get('products', ['as' => 'index','uses' => 'ProductsController@index' ]);
      Route::get('products/create', ['as' => 'create','uses' => 'ProductsController@create' ]);
      Route::get('products/edit/{id}', ['as' => 'edit', 'uses' => 'ProductsController@edit' ]);
      Route::post('products/update/{id}', ['as' => 'update','uses' => 'ProductsController@update' ]);
      Route::post('products/store', ['as' => 'store','uses' => 'ProductsController@store' ]);
      Route::get('products/destroy/{id}', ['as' => 'destroy','uses' => 'ProductsController@destroy' ]);
      Route::get('products/restore/{id}', ['as' => 'restore','uses' => 'ProductsController@restore' ]);
      Route::get('products/trash', ['as' => 'trash','uses' => 'ProductsController@trash' ]);
      /* Fim das Rotas do Produto*/
    });

    Route::group(['as' => 'clients.'], function () {
  /* Rotas do Cliente*/
      Route::get('clients', ['as' => 'index','uses' => 'ClientsController@index' ]);
      Route::get('clients/create', ['as' => 'create','uses' => 'ClientsController@create' ]);
      Route::get('clients/edit/{id}', ['as' => 'edit', 'uses' => 'ClientsController@edit' ]);
      Route::post('clients/update/{id}', ['as' => 'update','uses' => 'ClientsController@update' ]);
      Route::post('clients/store', ['as' => 'store','uses' => 'ClientsController@store' ]);
      Route::get('clients/destroy/{id}', ['as' => 'destroy','uses' => 'ClientsController@destroy' ]);
      Route::get('clients/restore/{id}', ['as' => 'restore','uses' => 'ClientsController@restore' ]);
      Route::get('clients/trash', ['as' => 'trash','uses' => 'ClientsController@trash' ]);
  /* Fim das Rotas do Cliente*/
    });

    Route::group(['as' => 'orders.'], function (){
  /* Rotas Orders*/
    Route::get('orders', ['as' => 'index','uses' => 'OrdersController@index' ]);
    Route::get('orders/{id}', ['as' => 'edit','uses' => 'OrdersController@edit' ]);
    Route::post('orders/update/{id}', ['as' => 'update','uses' => 'OrdersController@update' ]);
  /* Fim das Rotas Orders*/
    });

    Route::group(['as' => 'cupoms.'], function (){
  /* Rotas Cupoms*/
    Route::get('cupoms', ['as' => 'index','uses' => 'CupomsController@index' ]);
    Route::get('cupoms/create', ['as' => 'create','uses' => 'CupomsController@create' ]);
    Route::post('cupoms/store', ['as' => 'store','uses' => 'CupomsController@store' ]);
    Route::get('cupoms/{id}', ['as' => 'edit','uses' => 'CupomsController@edit' ]);
    Route::post('cupoms/update/{id}', ['as' => 'update','uses' => 'CupomsController@update' ]);
  /* Fim das Rotas Cupoms*/
    });
});

Route::group(['prefix' => 'customer','middleware' => 'auth.checkrole:client', 'as' => 'customer.'], function(){
    Route::get('order',['as' => 'order.index', 'uses' => 'CheckoutController@index']);
    Route::get('order/create',['as' => 'order.create', 'uses' => 'CheckoutController@create']);
    Route::post('order/store',['as' => 'order.store', 'uses' => 'CheckoutController@store']);

});
