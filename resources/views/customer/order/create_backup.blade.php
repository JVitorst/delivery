
@extends('app')

@section('content')
  <div class="container">
	 <h3>Novo pedido</h3>


  @include('errors._check')
  <div class="container">
    {!! Form::open(['route' => 'customer.order.store', 'class' => 'form'])  !!}

    <div class="form-group">
      <label style="font-size: 150%">Total:</label>
      <p id="total" style="font-size: 150%"></p>
      <a href="#"  id="btnNewItem" class="btn btn-default">Novo item</a>

      <table class="table table-bordered">
        <thead>
          <tr>
          <th>Produto</th>
          <th>Quantidade</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <td>
          <select class="form-control" name="items[0][product_id]">
            @foreach($products as $p)
            <option value="{{$p->id}}" data-price="{{ $p->price }}"> {{$p->name}} --- {{$p->price}} </option>
            @endforeach
          </select>
          </td>
          <td>
          {!!Form::text('items[0][qtd]', 1, ['class' => 'form-control']) !!}
          </td>
          </tr>
          </tbody>
      </table>
    </div>
    <div class="form-group">
      {!! Form::submit('Criar pedido', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
  </div>

@endsection

@section('post-script')
  <script>
    $('#btnNewItem').click(function(){

      var row  = $('table tbody > tr:last'),
        //NewRow - nova linha que sera clonada apartir d row passada
        newRow = row.clone(), length = $(" table tbody tr").length;
      newRow.find('td').each(function(){
        //Pegando informações para  a TD
        var td = $(this),
          //PAra cada coluna ira pegar os unputs e selects
                input = td.find('input,select'),
                name = input.attr('name');
        input.attr('name', name.replace( (length - 1 ) + "", length + "" ));
      });

      newRow.find('input').val('1');
      //Gerando row atras da ultima linha que foi colocada
      newRow.insertAfter(row);
      calculateTotal();
    });

    //
    $(document.body).on('click', 'select', function(){
      calculateTotal();
    });

    $(document.body).on('blur', 'input', function(){
      calculateTotal();
    });


    function calculateTotal(){
      var total = 0,
        //Pegando o tamanho das linhas q temos
        trLen = $('table tbody tr').length,
        //Setando o valor para as tr
        tr = null, price, qtd;
      for ( var i = 0; i < trLen; i++){
        tr = $('table tbody tr').eq(i);
        price = tr.find(':selected').data('price');
        qtd = tr.find('input').val();
        total += price * qtd;
      }
      $('#total').html(total);
    }
  </script>
@endsection
