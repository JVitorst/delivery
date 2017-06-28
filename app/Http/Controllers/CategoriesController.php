<?php

namespace delivery\Http\Controllers;

use Illuminate\Http\Request;
use delivery\Repositories\CategoryRepository;
use delivery\Http\Requests;
use delivery\Http\Controllers\Controller;
use delivery\Http\Requests\AdminCategoryRequest;

class CategoriesController extends Controller
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $titulo = "Categorias";

    //Consulta os dados no Model Categorias do banco de dados e atribui
    $categories = $this->repository->paginate();

        return view('admin.categories.index', compact('titulo', 'categories'));
    }

    public function create()
    {
        $titulo = "Categoria";
        return view('admin.categories.create', compact('titulo'));
    }

    public function store(AdminCategoryRequest $request)
    {

    //Variavel $data recebendo todos dados através do Request,
    // através dos campos do form
    $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.categories.index');
    }

    public function edit($id){

      $titulo = "Categoria";
      //Buscando a categoria pelo $id recebido pela função($id)
      $category = $this->repository->find($id);

        return view('admin.categories.edit', compact('category','titulo'));
    }

    public function update(AdminCategoryRequest $request, $id){

      //Variavel $data recebendo todos dados através do Request,
      // através dos campos do form
      $data = $request->all();
    		$this->repository->update($data, $id);

    		return redirect()->route('admin.categories.index');
    }
}
