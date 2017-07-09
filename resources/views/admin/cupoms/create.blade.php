@extends('app')

@section('content')

<div class="container">
  <h2>Criação de {{$titulo}}</h2>

  @include('errors._check')


  <!-- Form  - Illuminate/Html  -->
  {!! Form::open(['route'=>'admin.cupoms.store', 'class' => 'form']) !!}

  @include('admin.cupoms._form')

    <div class="form-group">
      {!! Form::submit('Criar', ['class' => 'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
</div>
  <!-- /-/-/-/ -->

@endsection
