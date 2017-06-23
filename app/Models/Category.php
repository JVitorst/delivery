<?php

namespace delivery\Models;

use Illuminate\Database\Eloquent\Model;
use delivery\Models\Product;

class Category extends Model
{
    //Atributo fillable serve para mass assigment, toda vez que for criar
    // registro com o model , ele permitirá que o registro seja criado no construtor esse registro
    // passando por padrão esse campo
    protected $fillable = [
      'name'
  ];

  public function products(){
    // ccada categoria tem produto relacionado
    return $this->hasMany(Product::class);
  }
}
