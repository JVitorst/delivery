@extends('app')

@section('content')

<div class="container">


  <div class="panel panel-default col-md-12">
    <div class="panel-heading text-center">
      <h4><strong>{{ $titulo }}: #{{ $order->id }}</strong></h4>
    </div>
    <div class="panel-body">
      <div class="col-md-12">
        <strong>Cliente</strong>
        <div class="pull-right"><span>{{ $order->client->user->name }}</span></div>
      </div>
      <div class="col-md-12">
        <strong>Data</strong>
        <div class="pull-right"><span>{{ $order->created_at->format('d/m/Y \à\s H:i:s') }}</span></div>
       </div>
       <div class="col-md-12">
         <strong>Endereço de entrega:</strong>
         <div class="pull-right">
           <span>
            {{ $order->client->address }} - {{ $order->client->city }} - {{ $order->client->state }}
          </span>
         </div>
         <br />
         <hr>
       </div>
       <div class="col-md-12">
         <strong>Total</strong>
         <div class="pull-right"><span>$</span><span>{{$order->total}}</span></div>
          <hr>
        </div>
      </div>

      <br/>
      {!!Form::model($order, ['route' => ['admin.orders.update', $order->id]])!!}

    <div class="form-group">
      {!! Form::label('Status', 'Status:') !!}
      {!! Form::select('status', $list_status, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('Entregador', 'Entregador:') !!}
      {!! Form::select('user_deliveryman_id', $deliveryman, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>

      {!! Form::close() !!}

    </div>


</div>

@endsection
