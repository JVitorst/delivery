<?php

namespace delivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements Transformable,AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use TransformableTrait,Authenticatable, Authorizable, CanResetPassword;

    public function client(){
        return $this->hasOne(Client::class);
    }

    //O banco de dados utilizado pela Model
    protected $table = 'users';

    //Quais atributos pode ser setados
    protected $fillable = ['name', 'email', 'password'];

    //Os Atributos excluidos do formulario JSON do Model,
    protected $hidden = ['password', 'remember_token'];

}
