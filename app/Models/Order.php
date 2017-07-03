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

  public function client(){
    return $this->belongsTo(Client::class);
  }

//PEgando os items do pedido
  public function item(){
    return $this->hasMany(OrderItem::class);
  }

//Cada pedido é relacionado a um Deliveryman
  public function deliveryman(){
    //Relação do campo user_deliveryman_id cm o Id da tabela User
    return $this->belongsTo(User::class, 'user_deliveryman_id', 'id');
  }


  public function products(){
    // ccada categoria tem produto relacionado
    return $this->hasMany(Product::class);
  }

}
