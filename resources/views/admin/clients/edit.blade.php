@extends('app')

@section('content')

<div class="container">
  <h2>Edição de {{$titulo}}: {{$client->user->name}}</h2>

  @include('errors._check')


  <!-- Form - model(procura a partir da model os nomes dos campos)
   e subtitui caso encontre valores para o mesmo)  -->
  {!! Form::model($client, ['route'=> ['admin.clients.update',$client->id]]) !!}

  @include('admin.clients._form')
    <div class="form-group">
      {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
</div>
  <!-- /-/-/-/ -->

@endsection
