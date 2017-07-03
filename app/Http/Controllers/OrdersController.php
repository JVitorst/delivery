<?php

namespace delivery\Http\Controllers;

use Illuminate\Http\Request;

use delivery\Http\Requests;
use delivery\Http\Controllers\Controller;
use delivery\Repositories\OrderRepository;
use delivery\Repositories\UserRepository;

class OrdersController extends Controller
{
    private $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository= $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $titulo  = "Pedidos";
        $orders = $this->repository->paginate();

        return view('admin.orders.index', compact('orders', 'titulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, UserRepository $userRepository)
    {
        //Seleciona a order atual escolhida para abrila na view
        $titulo = "Listagem Pedido";

        $list_status = [
         0 => 'Pendente',
         1 => 'A caminho',
         2 => 'Entregue',
         3 => 'Cancelado'
         ];

        $order = $this->repository->find($id);
        $deliveryman = $userRepository->getDeliverymen();
        return view('admin.orders.edit', compact('order', 'titulo', 'list_status', 'deliveryman'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $all = $request->all();
        $this->repository->update($all, $id);


        return redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function trash()
    {
        echo "teste";
    }
}
