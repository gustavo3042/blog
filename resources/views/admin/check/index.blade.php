
@extends('adminlte::page')

@section('title', 'Gustavo Rios App')


@section('content_header')

@stop

@section('content')


@livewire('admin.checkindex')


@stop

{{-- @section('js')
   
<script>
    document.addEventListener('DOMContentLoaded', function () {
      $('#imageModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que disparó el modal
        var imageUrl = button.data('image'); // Obtén la URL de la imagen
        var modalImage = document.getElementById('modalImage');
        modalImage.src = imageUrl; // Asigna la URL de la imagen al src del modal
      });
    });
  </script> 
   

@stop
 --}}

