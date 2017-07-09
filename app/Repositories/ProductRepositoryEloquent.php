<?php

namespace delivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use delivery\Repositories\ProductRepository;
use delivery\Models\Product;
use delivery\Validators\ProductValidator;

/**
 * Class ProductRepositoryEloquent
 * @package namespace delivery\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
  /**
   * SoftDelete - funcção para permitir o uso da onlyTrashed(função do softdelete que permite
   * listar apenas os deletados
   */
  public function onlyTrashed() {
       $this->model = $this->model->onlyTrashed();
       return $this;
    }
    /**
     * SoftDelete - funcção para permitir o uso da withTrashed(função do softdelete que permite
     * listar todos,, inclusive os deletados
     */
  public function withTrashed() {
       $this->model = $this->model->withTrashed();
       return $this;
    }

  public function lists($columns = null, $key =null){

    return $products = $this->model->get(['id', 'name', 'price']);

  }


    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
