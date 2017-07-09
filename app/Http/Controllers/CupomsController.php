<?php

namespace delivery\Http\Controllers;

use Illuminate\Http\Request;
use delivery\Repositories\CupomRepository;
use delivery\Http\Requests;
use delivery\Http\Controllers\Controller;
use delivery\Http\Requests\AdminCupomRequest;

class CupomsController extends Controller
{
    private $repository;

    public function __construct(CupomRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $titulo = "Cupoms";

    //Consulta os dados no Model Categorias do banco de dados e atribui
    $cupoms = $this->repository->paginate();

        return view('admin.cupoms.index', compact('titulo', 'cupoms'));
    }

    public function create()
    {
        $titulo = "Cupom";
        return view('admin.cupoms.create', compact('titulo'));
    }

    public function store(AdminCupomRequest $request)
    {

    //Variavel $data recebendo todos dados através do Request,
    // através dos campos do form
    $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.cupoms.index');
    }

    public function edit($id){

      $titulo = "Cupom";
      //Buscando a categoria pelo $id recebido pela função($id)
      $cupom = $this->repository->find($id);

        return view('admin.cupoms.edit', compact('cupom','titulo'));
    }

    public function update(AdminCupomRequest $request, $id){

      //Variavel $data recebendo todos dados através do Request,
      // através dos campos do form
      $data = $request->all();
    		$this->repository->update($data, $id);

    		return redirect()->route('admin.cupoms.index');
    }
}
