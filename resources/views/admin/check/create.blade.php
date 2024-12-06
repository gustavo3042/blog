@extends('adminlte::page')

@section('title', 'Gustavo Rios App')




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


  
    <div class="card mt-5">

      <div class="card-body">

        {!! Form::open(['route'=>'check.store','autocomplete'=>'off','files'=> true]) !!}

        


        @livewire('admin.check-create')

          


        {!! Form::submit('Crear CheckList',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}

      </div>

    </div>
@stop

@section('css')

 

@stop

@section('js')

 <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

 
 <!--<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script> -->
 
 
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"> </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>




<!--
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


-->


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

alert('Publicado significa que esta publicacion aparecera en el foro disponible para los usuarios registrados como clientes');

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



  $('.addRow').on('click',function(e){
      addRow();
       e.preventDefault();
      
  });




  function addRow()
  {
      var tr='<tr>'+
      '<td><input type="text" name="product_name[]" class="form-control" required=""></td>'+

      '<td><input type="text" name="quantity[]" class="form-control quantity" required=""></td>'+

      '<td><input type="text" name="budget[]" class="form-control budget"></td>'+

     

      '<td><input type="text" name="brand[]" class="form-control"></td>'+

      '<td><input type="text" name="cantidadRepuestos[]" class="form-control cantidadRepuestos" required=""></td>'+

      '<td><input type="text" name="precioRepuestos[]" class="form-control precioRepuestos" required=""></td>'+

      ' <td><input type="text" name="amount[]" class="form-control amount"></td>'+

      '<td><a href="#" class="btn btn-danger remove"><i class="fa fa-trash"></i></a></td>'+
      '</tr>';
      $('tbody').append(tr);
  };


  $('.remove').live('click',function(e){

      var last=$('tbody tr').length;

      if(last==1){
          alert("no se puede eliminar la ultima columna");
          e.preventDefault();
      }
      else{
           $(this).parent().parent().remove();
           e.preventDefault();
      }

  });




</script>




@stop
