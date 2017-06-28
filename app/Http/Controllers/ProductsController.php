<?php

namespace delivery\Http\Controllers;

use Illuminate\Http\Request;
use delivery\Repositories\ProductRepository;
use delivery\Repositories\CategoryRepository;
use delivery\Http\Requests;
use delivery\Http\Controllers\Controller;
use delivery\Http\Controllers\ProductsController;
use delivery\Http\Requests\AdminProductRequest;
use delivery\uctRequest;
use delivery\Models\Product;

class ProductsController extends Controller
{
    private $repository;
    private $categoryRepository;

    public function __construct(ProductRepository $repository,
                                CategoryRepository $categoryRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $titulo = "Produtos";

        //$products = $this->repository->onlyTrashed()->orderBy('id', 'desc')->paginate(2);
        $products = $this->repository->orderBy('id', 'desc')->paginate();



        return view('admin.products.index', compact('titulo', 'products'));
    }

    public function trash()
    {
        $titulo = "Produtos";

        $products = $this->repository->onlyTrashed()->orderBy('id', 'desc')->paginate();



        return view('admin.products.trash', compact('titulo', 'products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->lists($columns = null, $key =null);
        $titulo = "Produtos";
        return view('admin.products.create', compact('titulo', 'categories'));
    }

    public function store(AdminProductRequest $request)
    {

    //Variavel $data recebendo todos dados através do Request,
    // através dos campos do form
    $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $titulo = "Produto";
        $categories = $this->categoryRepository->lists($columns = null, $key =null);

      //Buscando a produto pelo $id recebido pela função($id)
      $product = $this->repository->find($id);

        return view('admin.products.edit', compact('product', 'titulo', 'categories'));
    }

    public function update(AdminProductRequest $request, $id)
    {

      //Variavel $data recebendo todos dados através do Request,
      // através dos campos do form
      $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.products.index');
    }

    /*
    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->route('admin.products.index');
    }
    */

    public function destroy($id){
        //$product = $this->repository->find($id);

        $product = Product::find( $id );

        $product->delete();
        return redirect()->route('admin.products.index');

    }

    //Função para restaura o registro setado pelo SoftDelete
    public function restore($id){

        $products = $this->repository->withTrashed()->find($id)->restore();
        return redirect()->route('admin.products.trash');

    }
}
