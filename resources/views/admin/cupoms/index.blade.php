@extends('app')

@section('content')

  <h2>Listagem de {{$titulo}}</h2>

<hr>
<a href="{{route('admin.cupoms.create')}}" class="btn btn-primary">Novo Cupom</a>
<br/>

<table class="table table-striped table-hover table-responsive">
  <thead>
    <tr>
      <th>ID</th>
      <th>Código</th>
      <th>Valor</th>
      <th>Ação</th>
    </tr>
  </thead>
<tbody>
  @foreach($cupoms as $cupom)
  <tr>
    <td>{{$cupom->id}}</td>
    <td>{{$cupom->code}}</td>
    <td>{{$cupom->value}}</td>
    <td><a href="{{route('admin.cupoms.edit', ['id' => $cupom->id])}}" class="btn btn-primary btn-block">Editar</a></td>
  </tr>
  @endforeach
</tbody>
</table>
{!! $cupoms->render() !!}

@endsection
