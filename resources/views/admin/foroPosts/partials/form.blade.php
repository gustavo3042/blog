

<input type="hidden" name="user_id" value="{{auth()->user()->id}}">

<div class="form-group">
    {!! Form::label('nombre','Nombre ') !!}
    {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del post']) !!}
    
    
    @error ('nombre')
    <small class="text-danger">{{$message}}</small>
    @enderror
    
    </div>
    

   
   <input type="hidden" name="fecha" class="form-control" value="{{\Carbon\Carbon::now()->format('Y/m/d')}}" id="" readonly>
      
      
    
    
 
    
    
    <div class="form-group">
    
    {!! Form::label('category_foros_id','Categoría') !!}
    {!! Form::select('category_foros_id',$category_foro,null,['class'=>'form-control']) !!}
    
    
    @error ('category_id')
      <small class="text-danger">{{$message}}</small>
    @enderror
    </div>
    
    
    
    
 
    
    
    
    
    
    <div class="form-group">
    <div class="font-weight-bold">Estado</div>
    
      <label>
    
    {!! Form::radio('status',1,true) !!}
    Borrador
    
      </label>
    
    
      <label>
    
    {!! Form::radio('status',2) !!}
    Publicado
    
      </label>
    
    
    
      @error ('status')
        <br>
        <small class="text-danger">{{$message}}</small>
      @enderror
    
      </div>
    
    <!--Para hacer grid o dividir en partes -->
      <div class="row mb-3">
    
        <div class="col-sm">
    <div class="image-wrapper">
    
    @isset($postsForo->image)
    
      <img id="picture" src="{{asset('storage').'/'.$postsForo->image->url}}" alt="">
    
    @else
    
        <img id="picture" src="https://cdn.pixabay.com/photo/2016/11/29/09/32/auto-1868726_1280.jpg" alt="">
    
    @endif
    
    </div>
        </div>
    
        <div class="col-sm">
    
    <div class="form-group">
    {!! Form::label('file','Imagen que se mostrara en el post')  !!}
    {!! Form::file('file', ['class'=>'form-control-file','accept' => 'image/*']) !!}
    
    @error ('file')
      <span class="text-danger">{{$message}}</span>
    @enderror
    
    </div>
    
    
    
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
    
      </div>
    
    
    
   
    
    
    
    
    <div class="form-group">
    
    {!! Form::label('body','Cuerpo del Post') !!}
    {!! Form::textarea('body',null,['class'=>'form-control']) !!}
    
    
    @error ('body')
      <small class="text-danger">{{$message}}</small>
    @enderror
    
    </div>
    