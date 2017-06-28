@extends('app')

@section('content')

<div class="container">
  <h2>Criação de {{$titulo}}</h2>

  @include('errors._check')


  <!-- Form  - Illuminate/Html  -->
  {!! Form::open(['route'=>'admin.products.store', 'class' => 'form']) !!}

  @include('admin.products._form')

    <div class="form-group">
      {!! Form::submit('Criar', ['class' => 'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
</div>
  <!-- /-/-/-/ -->

@endsection
