@extends('app')

@section('content')

<div class="container">
  <h2>Listagem de {{$titulo}}</h2>

<hr>

<br/>

<table class="table table-striped table-hover table-responsive">
  <thead>
    <tr>
      <th>ID</th>
      <th>Data</th>
      <th>itens</th>
      <th>Total</th>
      <th>Entregador</th>
      <th>Status</th>
      <th>Ação</th>
    </tr>
  </thead>
<tbody>
  @foreach($orders as $order)
  <tr>
    <td>#{{$order->id}}</td>
    <td>
      {{$order->created_at->format('d/m/Y \à\s H:i:s')}}
    </td>
    <td>
      <ul>
        @foreach($order->item as $i)
          <li>{{$i->product->name}}</li>
        @endforeach
      </ul>
    </td>

    <td>{{$order->total}}</td>

    <td>
      @if($order->deliveryman)
        {{$order->deliveryman->name}}
      @else
        --
      @endif
    </td>
    <td>
      <?php
            switch ($order->status) {
                case 0: echo 'Pendente'; break;
                case 1: echo 'A caminho'; break;
                case 2: echo 'Entregue'; break;
                case 3: echo 'Cancelado'; break;
            }?>
    </td>
    <td><a href="{{route('admin.orders.edit', ['id' => $order->id]) }}" class="btn btn-primary btn-block">Editar</a></td>
  </tr>
  @endforeach
</tbody>
</table>
{!! $orders->render() !!}
</div>
@endsection
