<?php

namespace delivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Client extends Model implements Transformable
{
    use TransformableTrait;

    //Atributo fillable serve para mass assigment, toda vez que for criar
    // registro com o model , ele permitirá que o registro seja criado no construtor esse registro
    // passando por padrão esse campo
    protected $fillable = [
      'user_id',
      'phone',
      'city',
      'state',
      'zipcode'
  ];

  public function user(){
    // ccada client tem apenas um usuario relacionado ( 1: 1)
    return $this->hasOne(User::class);
  }

}
