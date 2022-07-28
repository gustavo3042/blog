@extends('adminlte::page')

@section('title', 'Gustavo Rios App')

@section('content_header')

<div class="card-header">

    <h1 style="font-weight: bold;" class="text-center">Crear Presupuesto</h1>

    <a class="btn btn-primary" href="{{route('check.index')}}">volver</a>

    

  </div>

@stop


@section('content')

  <style>
    .image-wrapper{
  position: relative;
  padding-bottom: 56.25%;

    }

    .image-wrapper img{

  position: absolute;
  object-fit: cover;
  width: 100%;
  height: 100%;
    }

  </style>


    <p>Ingrese datos para guardar el presupuesto de la reparación.</p>
    <div class="card">

      <div class="card-body">

        
        <h5 class="text-center" style="font-weight: bold; background:#0000ff; border-radius:30px; color:white;">Mano de Obra</h5>

        <form  action="" method="post">

            <input type="hidden" name="check_lists_id" value="{{$check->id}}" class="form-control col-md-6">

            <br>

            {{csrf_field()}}

              <section>
                  <div class="panel panel-header">
        
                      <div class="row">
                          <div class="col-md-6">
                      <div class="form-group">
                          <label for="encargado">Encargado</label>
                          <input type="text" name="encargado" class="form-control" value="{{auth()->user()->name}}" placeholder="" readonly>
                      </div></div>
                      <div class="col-md-6">
                      <div class="form-group">
                         

                       
                            <p class="font-weight-bold">Ficha Técnica Reparaciones Realizadas</p>
                  
                  
                            @foreach ($reparaciones as $reparar )
                  
                              <label class="mr-2">
                  
                             <input type="text" value="  {{$reparar->name}}" class="form-control" readonly>
                           
                  
                              </label>
                  
                            @endforeach
                  
                            <br>
                  
                  
                            @error ('reparaciones')
                  
                              <small class="text-danger">{{$message}}</small>
                  
                            @enderror
                  
                        

                      </div></div>
        
                  </div></div>
                  <div class="panel panel-footer" >
                      <table class="table table-bordered hover">
                          <thead>
                              <tr>
                                  <th>Trabajo</th>
                                  <th>Descripción</th>
                                  <th>Cantidad</th>
                                  <th>Precio</th>
                                  <th>Total</th>
        
                                  <!--boton addRow para agregar input para abajo class addRow -->
                                  <th><a href="#" class="addRow"><i class="fa fa-plus"></i></a></th>
                              </tr>
                          </thead>
        
                          <tbody>
              <tr>
              <td><input type="text" name="product_name[]" class="form-control" required=""></td>
              <td><input type="text" name="brand[]" class="form-control"></td>
                <td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>
                <td><input type="text" name="budget[]" class="form-control budget"></td>
                <td><input type="text" name="amount[]" class="form-control amount"></td>
              <td><a href="#" class="btn btn-danger remove"><i class="fa fa-trash"></i></a></td>
              </tr>
                              </tr>
                          </tbody>
        
        
                          <tfoot>
                              <tr>
                                  <td style="border: none"></td>
                                  <td style="border: none"></td>
                                  <td style="border: none"></td>
                                  <td >Total :</td>
                                  <td><b class="total"></b> </td>
                                  <td><input type="submit" name="" value="Guardar" class="btn btn-primary"></td>
                              </tr>
                          </tfoot>
        
        
        
                      </table>
        
        
                  </div>
              </section>
          </form>

      </div>

    </div>
@stop

@section('css')

  <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
  <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"> </script>


  <script>


      ClassicEditor
          .create( document.querySelector( '#problema' ) )
          .catch( error => {
              console.error( error );
          } );


  </script>


  <script>


      ClassicEditor
          .create( document.querySelector( '#solucion' ) )
          .catch( error => {
              console.error( error );
          } );


  </script>


  <script>


  document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }



  </script>

  <script>

function most(){

alert('Publicado');

}


  </script>

<script type="text/javascript">

  $('tbody').delegate('.quantity,.budget','keyup',function(){
      var tr= $(this).parent().parent();
      var quantity=tr.find('.quantity').val();
      var budget=tr.find('.budget').val();
      var amount=(quantity*budget);
      tr.find('.amount').val(amount);
      total();

  });


  function total()
  {

    var total = 0;

    $('.amount').each(function(i,e){


      var amount = $(this).val()-0;

      total +=amount;


    });

    $('.total').html(total+".00 $");

  }



  $('.addRow').on('click',function(){
      addRow();
  });




  function addRow()
  {
      var tr='<tr>'+
      '<td><input type="text" name="product_name[]" class="form-control" required=""></td>'+

      '<td><input type="text" name="brand[]" class="form-control"></td>'+

      '<td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>'+

      '<td><input type="text" name="budget[]" class="form-control budget"></td>'+

      ' <td><input type="text" name="amount[]" class="form-control amount"></td>'+

      '<td><a href="#" class="btn btn-danger remove"><i class="fa fa-trash"></i></a></td>'+
      '</tr>';
      $('tbody').append(tr);
  };


  $('.remove').live('click',function(){

      var last=$('tbody tr').length;

      if(last==1){
          alert("no se puede eliminar la ultima columna");
      }
      else{
           $(this).parent().parent().remove();
      }

  });




</script>

@stop
