@extends('app')

@section('content')
  <h3>Meus pedidos</h3>
  <a href="{{route('customer.order.create')}}" class="btn btn-default">Novo pedido</a>
  <br><br>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Total</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $order)
        <tr>
          <td>{{$order->id}}</td>
          <td>{{$order->total}}</td>
          <td>{{$order->status}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {!! $orders->render() !!}
@endsection
