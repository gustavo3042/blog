
<div class="row mb-3">

    <div class="col-sm">
<div class="image-wrapper">

@isset($worker->image)

  <img id="picture" src="{{asset('storage').'/'.$worker->image->url}}" alt="">

@else

    <img id="picture" src="https://media.istockphoto.com/id/1400087171/es/foto/conceptos-de-planificaci%C3%B3n-empresarial-procesos-y-flujos-de-trabajo-empresariales-de-alto.jpg?s=1024x1024&w=is&k=20&c=tGGEjHYT-AK-WhWqfpk24U41CHPMTaXuqpLNFSRf6s8=" alt="">

@endif

</div>
    </div>

    <div class="col-sm">

<div class="form-group">
{!! Form::label('photo','Foto del trabajador')  !!}
{!! Form::file('photo', ['class'=>'form-control-file','accept' => 'image/*']) !!}

@error ('photo')
  <span class="text-danger">{{$message}}</span>
@enderror

</div>



Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>

  </div>

<div class="row">

 <div class="col">
    
    <div class="form-group">

        <label for="name">Nombre</label>    
        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre ']) !!}
        
        </div>
</div>   


<div class="col">
    
    <div class="form-group">

        <label for="name2">Segundo Nombre</label>    
        {!! Form::text('name2',null,['class'=>'form-control','placeholder'=>'Ingrese el segundo nombre']) !!}
        
    </div>

</div>  

</div>   



<div class="row">

    <div class="col">
       
       <div class="form-group">
   
           <label for="surname">Apellido Paterno</label>    
           {!! Form::text('surname',null,['class'=>'form-control','placeholder'=>'Ingrese apellido paterno']) !!}
           
           </div>
   </div>   
   
   
   <div class="col">
       
       <div class="form-group">
   
           <label for="surname2">Apellido Materno</label>    
           {!! Form::text('surname2',null,['class'=>'form-control','placeholder'=>'Ingrese apellido materno']) !!}
           
       </div>
   
   </div>  
   
   </div>   



   <div class="row">


    <div class="col">


        <div class="form-group">
            <label for="rut">Rut</label>
            {!! Form::text('rut',null,['class'=>'form-control','placeholder'=>'Ingrese el rut']) !!}
        </div>
      
        

    </div>

    <div class="col">

        
        <div class="form-group">
            <label for="birthDate">Fecha de Nacimiento</label>
            
            {!! Form::date('birthDate',null,['class'=>'form-control','placeholder'=>'Ingrese fecha de nacimiento']) !!}
        </div>

    </div>

   </div>


   <div class="row">

    <div class="col">

    
        <div class="form-group">
            <div class="font-weight-bold">Genero</div>
            
              <label>
            
            {!! Form::radio('sex',1,true) !!}
            Masculino
            
              </label>
            
            
              <label>
            
            {!! Form::radio('sex',0) !!}
            Femenino
            
              </label>
                    
              </div>                     
     

    </div>


    <div class="col">

        <div class="form-group">
            <label for="address">Dirección</label>
            {!! Form::text('address',null,['class'=>'form-control','placeholder'=>'Ingrese dirección']) !!}
        </div>
        
    </div>

   </div>


   <div class="row">

    <div class="col">

        <div class="form-group">
            <label for="phone">Telefono</label>
            {!! Form::number('phone',null,['class'=>'form-control','placeholder'=>'Ingrese telefono']) !!}
        </div>

    </div>


    <div class="col">


        <div class="form-group">
            {!! Form::label('afp','Afp') !!}
            {!! Form::select('afp',$afp,null,['class'=>'form-control']) !!}
            
        </div>


    </div>

   </div>

   <div class="row">

    <div class="col">

        <div class="form-group">
            <label for="email">Email</label>
            {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese email']) !!}
        </div>

    </div>


    <div class="col">


        <div class="form-group">
            {!! Form::label('tipoContrato','Tipo Contrato') !!}
            {!! Form::select('tipoContrato',$contrat_id,null,['class'=>'form-control']) !!}
            
        </div>

    </div>

   </div>

   <div class="row">

    <div class="col">

        <div class="form-group">
            <label for="fechaContrato">Fecha de Contrato</label>
        
            {!! Form::date('fechaContrato',null,['class'=>'form-control','placeholder'=>'Ingrese fecha de contrato']) !!}
        </div>

    </div>

    <div class="col">

        <div class="form-group">
            <label for="suspensionContrato">Suspension de Contrato</label>
           
            {!! Form::date('suspensionContrato',null,['class'=>'form-control','placeholder'=>'Ingrese fecha de suspension de contrato']) !!}
        </div>

    </div>


   </div>


   <div class="row">

    <div class="col">

        <div class="form-group">
            <label for="finiquito">Finiquito</label>
         
            {!! Form::date('finiquito',null,['class'=>'form-control','placeholder'=>'Ingrese fecha de finiquito']) !!}
        </div>

    </div>


    <div class="col">


        <div class="form-group">
            <label for="causalFinContrato">Causas del fin de contrato </label>
            {!! Form::text('causalFinContrato',null,['class'=>'form-control','placeholder'=>'Ingrese causa de fin de contrato']) !!}
        </div>

    </div>

   </div>