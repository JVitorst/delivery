@extends('app')

@section('content')

<div class="container">
  <h2>{{$titulo}}<b>inativos</b> </h2>

<hr>
<br/>

<table class="table table-striped table-hover table-responsive">
  <thead>
    <tr>
      <th>#</th>
      <th>Produto</th>
      <th>Categoria</th>
      <th>Preço</th>
      <th>Deletado em</th>
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
    <td>{{$product->deleted_at}}</td>
    <td style="width: 15%">
    <a href="{{route('admin.products.restore', ['id' => $product->id])}}" class="btn btn-primary ">Revogar</a>
  </tr>
  @endforeach
</tbody>
</table>
{!! $products->render() !!}
</div>
@endsection
