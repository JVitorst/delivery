@extends('app')

@section('content')

<div class="container">
  <h2>Listagem de {{$titulo}}</h2>

<hr>
<a href="{{route('admin.products.create')}}" class="btn btn-primary">Novo produto</a>
<a href="{{route('admin.products.trash')}}" class="btn btn-default">Produtos inativos</a>
<br/>

<table class="table table-striped table-hover table-responsive">
  <thead>
    <tr>
      <th>#</th>
      <th>Produto</th>
      <th>Categoria</th>
      <th>Preço</th>
      <th>Ação</th>
    </tr>
  </thead>
<tbody>
  @foreach($products as $product)
  <tr>
    <td>{{$product->id}}</td>
    <td>{{$product->name}}</td>
    <td>{{$product->category->name}}</td>
    <td>R${{$product->price}}</td>
    <td style="width: 15%">
    <a href="{{route('admin.products.edit', ['id' => $product->id])}}" class="btn btn-primary ">Editar</a>
    <a href="{{route('admin.products.destroy', ['id' => $product->id])}}" class="btn btn-danger">Deletar</a></td>
  </tr>
  @endforeach
</tbody>
</table>
{!! $products->render() !!}
</div>
@endsection
