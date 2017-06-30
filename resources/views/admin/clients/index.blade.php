@extends('app')

@section('content')

<div class="container">
  <h2>Listagem de {{$titulo}}</h2>

<hr>
<a href="{{route('admin.clients.create')}}" class="btn btn-primary">Novo Cliente</a>
<br/>

<table class="table table-striped table-hover table-responsive">
  <thead>
    <tr>
      <th>#</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Fone.</th>
      <th>Endereço</th>
      <th>Ação</th>
    </tr>
  </thead>
<tbody>
  @foreach($clients as $client)
  <tr>
    <td>{{$client->id}}</td>
    <td>{{$client->user->name}}</td>
    <td>{{$client->user->email}}</td>
    <td>{{$client->phone}}</td>
    <td>{{$client->address}}</td>
    <td><a href="{{route('admin.clients.edit', ['id' => $client->id])}}" class="btn btn-primary btn-block">Editar</a></td>
  </tr>
  @endforeach
</tbody>
</table>
{!! $clients->render() !!}
</div>
@endsection
