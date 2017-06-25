<?php

namespace delivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
    use TransformableTrait;

    /*Atributo fillable serve para mass assigment, toda vez que for criar
     registro com o model , ele permitirá que o registro seja criado no
     construtor esse registro passando por padrão esse campo */

    protected $fillable = [
      'client_id',
      'user_deliveryman_id',
      'total',
      'status'
  ];

//PEgando os items do pedido
  public function item(){
    return $this->hasMany(OrderItem::class);
  }

//Cada pedido é relacionado a um Deliveryman
  public function deliveryman(){
    return $this->belongsTo(User::class);
  }


  public function products(){
    // ccada categoria tem produto relacionado
    return $this->hasMany(Product::class);
  }

}
