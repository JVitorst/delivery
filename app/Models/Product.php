<?php

namespace delivery\Models;

use Illuminate\Database\Eloquent\Model;
use delivery\Models\Category;

class Product extends Model
{
    //Atributo fillable serve para mass assigment, toda vez que for criar
    // registro com o model , ele permitirá que o registro seja criado no construtor esse registro
    // passando por padrão esse campo
    protected $fillable = [
      'category_id',
      'name',
      'description',
      'price'
  ];
//
  public function category(){
    //O produto pertence a uma categoria
    return $this->belongsTo(Category::class);
  }
}
