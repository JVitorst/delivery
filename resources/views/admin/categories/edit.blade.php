@extends('app')

@section('content')

<div class="container">
  <h2>Edição de {{$titulo}}:</h2>
  <h3>{{$category->name}}</h3>

  @include('errors._check')


  <!-- Form - model(procura a partir da model os nomes dos campos)
   e subtitui caso encontre valores para o mesmo)  -->
  {!! Form::model($category, ['route'=> ['admin.categories.update',$category->id]]) !!}

  @include('admin.categories._form')
    <div class="form-group">
      {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
</div>
  <!-- /-/-/-/ -->

@endsection
