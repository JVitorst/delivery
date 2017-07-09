<?php
namespace delivery\Services;
use delivery\Repositories\OrderRepository;
use delivery\Repositories\CupomRepository;
use delivery\Repositories\ProductRepository;
use delivery\Models\Order;

/**
 *
 */
class OrderService
{
  private $orderRepository;
  private $cupomRepository;
  private $productRepository;

  function __construct(OrderRepository $orderRepository,
                        CupomRepository $cupomRepository,
                        ProductRepository $productRepository)
  {
    # code...
    $this->orderRepository = $orderRepository;
    $this->cupomRepository = $cupomRepository;
    $this->productRepository = $productRepository;

  }

  public function create(array $data){

    \DB::beginTransaction();
    try {
      //Forçando que o pedido fique sempre pendente
      $data['status'] = 0;
      //Verificando se existe cupom de desconto
      if (isset($data['cupom_code'])) {
        $cupom = $this->cupomRepository->findByField(
            'code', $data['cupom_code'])->first();
            $data['cupom_id'] = $cupom->id;
            $cupom->used = 1;
            $cupom->save();
            //PAra não ter perigo de persistir dados
            unset($data['cupom_code']);
      }
      //Preparando a variavel $data
      $items = $data['items'];
      unset($data['items']);
      //Criando o pedido
      $order = $this->orderRepository->create($data);
      //Total dos preços
      $total = 0;

      foreach ($items as $item) {
        $item['price'] = $this->productRepository->find($item['product_id'])->price;
        $order->item()->create($item);
        $total += $item['price'] * $item['qtd'];
      }

      $order->total = $total;
      if (isset($cupom)) {
        $order->total = $total - $cupom->value;
      }
      $order->save();
      \DB::commit();
    } catch (Exception $e) {
      \DB::rollback();
      throw $e;

    }



  }



}
