


@extends('adminlte::page')

@section('title', 'Gustavo Rios App')



@section('content')
@livewire('admin.check-show',['check'=> $check])
@stop



@section('js')
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

