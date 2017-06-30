<?php

namespace delivery\Http\Controllers;

use Illuminate\Http\Request;
use delivery\Repositories\ClientRepository;
use delivery\Http\Requests;
use delivery\Http\Controllers\Controller;
use delivery\Http\Requests\AdminClientRequest;
use delivery\Services\ClientService;

class ClientsController extends Controller
{
    private $repository;
    private $clientService;

    public function __construct(ClientRepository $repository,
                                ClientService $clientService)
    {
        $this->repository = $repository;
        $this->clientService = $clientService;
    }

    public function index()
    {
        $titulo = "Clientes";

    //Consulta os dados no Model Clientes do banco de dados e atribui a var
    $clients = $this->repository->orderBy('id', 'desc')->paginate();

        return view('admin.clients.index', compact('titulo', 'clients'));
    }

    public function create()
    {
        $titulo = "Clientes";
        return view('admin.clients.create', compact('titulo'));
    }

    public function store(AdminClientRequest $request)
    {

    //Variavel $data recebendo todos dados através do Request,
    // através dos campos do form
    $data = $request->all();
        $this->clientService->create($data);

        return redirect()->route('admin.clients.index');
    }

    public function edit($id){

      $titulo = "Cliente";
      //Buscando a categoria pelo $id recebido pela função($id)
      $client = $this->repository->find($id);

        return view('admin.clients.edit', compact('client','titulo'));
    }

    public function update(AdminClientRequest $request, $id){

      //Variavel $data recebendo todos dados através do Request,
      // através dos campos do form
      $data = $request->all();
      dd($data);
    		$this->clientService->update($data, $id);

    		return redirect()->route('admin.clients.index');
    }
}
