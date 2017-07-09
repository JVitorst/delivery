<?php

namespace delivery\Http\Controllers;

use Illuminate\Http\Request;

use delivery\Http\Requests;
use delivery\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use delivery\Http\Requests\AdminCategoryRequest;
use delivery\Repositories\UserRepository;
use delivery\Repositories\OrderRepository;
use delivery\Repositories\ProductRepository;

use delivery\Http\Controllers\ProductsController;
use delivery\Models\Product;
use delivery\Services\OrderService;

class CheckoutController extends Controller
{
    private $repository;
    private $userRepository;
    private $productRepository;
    private $sercice;

    public function __construct(OrderRepository $repository,
                                UserRepository $userRepository,
                                ProductRepository $productRepository,
                                OrderService $service)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->service = $service;
    }
    //use \Auth;
    public function index(){
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
        //Pegando os pedido apenas de um Cliente especifico
        $orders = $this->repository->scopeQuery(function($query) use($clientId){
            return $query->where('client_id', '=', $clientId);
        })->paginate();

        return view('customer.order.index', compact('orders'));
    }

    public function create(){
      //Listagem de Produtos a partir do lists()
      $products = $this->productRepository->lists($columns = null, $key =null);
      return view('customer.order.create', compact('products'));

      }

      public function store(Request $request){

        $data = $request->all();
        //Identificando de quem é o pedido
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
        $data['client_id']=$clientId;
        $this->service->create($data);

        return redirect()->route('customer.order.index');

      }


}
