@extends('app')

@section('content')

<div class="container">
  <h2>Listagem de {{$titulo}}</h2>

<hr>
<a href="{{route('admin.categories.create')}}" class="btn btn-primary">Nova Categoria</a>
<br/>

<table class="table table-striped table-hover table-responsive">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Ação</th>
    </tr>
  </thead>
<tbody>
  @foreach($categories as $category)
  <tr>
    <td>{{$category->id}}</td>
    <td>{{$category->name}}</td>
    <td><a href="{{route('admin.categories.edit', ['id' => $category->id])}}" class="btn btn-primary btn-block">Editar</a></td>
  </tr>
  @endforeach
</tbody>
</table>
{!! $categories->render() !!}
</div>
@endsection
