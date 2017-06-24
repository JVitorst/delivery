<?php

namespace delivery\Models;

use Illuminate\Database\Eloquent\Model;
use delivery\Models\Product;
use delivery\Models\Order;
use delivery\Models\User;

class OrderItem extends Model
{
    //Atributo fillable serve para mass assigment, toda vez que for criar
    // registro com o model , ele permitirá que o registro seja criado no construtor esse registro
    // passando por padrão esse campo
    protected $fillable = [
      'product_id',
      'order_id',
      'price',
      'qtd'
  ];

  public function order(){
    return $this->belongsTo(Order::class);
  }

  //Qual produto esta relacionado a esse item
  public function product(){
    return $this->belongsTo(Product::class);
  }



}
