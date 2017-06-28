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


  public function onlyTrashed() {
       $this->model = $this->model->onlyTrashed();
       return $this;
    }

  public function withTrashed() {
       $this->model = $this->model->withTrashed();
       return $this;
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
