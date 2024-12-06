


@extends('adminlte::page')

@section('title', 'Gustavo Rios App')



@section('content')
@livewire('admin.check-show',['check'=> $check])
@stop



@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if (session('error'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: '{{ session('error') }}',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif

 @if(session('alert'))
<script>
    Swal.fire({
        title: "{{ session('alert.title') }}",
        text: "{{ session('alert.text') }}",
        icon: "{{ session('alert.icon') }}",
    });
</script>
@endif 

<script>
    $(document).ready(function() {
        
        $('#workers').select2({
            width: '100%'
        });


     


    });

    function submitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form
        btn.form.submit();
    }
</script>




@stop

