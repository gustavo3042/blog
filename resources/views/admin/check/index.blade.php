
@extends('adminlte::page')

@section('title', 'Gustavo Rios App')


@section('content_header')

@stop

@section('content')


@livewire('admin.checkindex')


@stop

 @section('js')
   
{{--  <script>
    document.addEventListener('DOMContentLoaded', function () {
        function initializeModal() {
            $('#imageModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Botón que disparó el modal
                var imageUrl = button.data('image'); // Obtén la URL de la imagen
                var modalImage = document.getElementById('modalImage');
                modalImage.src = imageUrl; // Asigna la URL de la imagen al src del modal
            });
        }
  
        // Inicializa el modal al cargar la página
        initializeModal();
  
        // Re-inicializa el modal cada vez que Livewire actualice el DOM
        Livewire.hook('message.processed', (message, component) => {
            initializeModal();
        });
    });
  </script> --}}
   

@stop
 

