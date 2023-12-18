<x-app-layout>



  <header style="background: white">
    <!-- Navbar -->
   
    <!-- Navbar -->
  
    <!-- Jumbotron -->
    <div class="text-center  text-gray-800 py-20 px-6">
    
      <h1 class="text-5xl font-bold mt-0 mb-6">Mecánica Ríos</h1>
      <h3 class="text-3xl font-bold mb-8">Mecanica en General</h3>
   
      <a href="{{route('posts.sobreNosotros')}}" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="light" href="#!" role="button">Sobre Nosotros</a>
    </div>
    <!-- Jumbotron -->


    
    



  </header>

  

  <br>


<div style="background: white" class="container py-8  ">

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


  @foreach ($posts as $post)
<article style="background-image: url( @if($post->image) {{asset('storage').'/'.$post->image->url}} @else https://cdn.pixabay.com/photo/2021/05/27/20/53/field-6289253_960_720.jpg @endif)" class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2  @endif">

<div class="w-full h-full px-8 flex flex-col justify-center">

  <div class="">
  @foreach ($post->tags as $tag)

  <a class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full" href="{{route('posts.tag',$tag)}}">{{$tag->name}}</a>

  @endforeach
  </div>

<h1 class="text-4xl text-white leading-8 foont-bold mt-2">
<a href="{{route('posts.shows',$post)}}">
{{$post->name}}

</a>


</h1>
</div>



</article>
  @endforeach
</div>

<br>
<br>

<div class="container pt-5">

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


    

      <div class="card">

        <h1 class="text-4xl text-dark leading-8 foont-bold mt-2">Ubicación Taller</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d967.2835836475276!2d-72.10535166325568!3d-36.621683601440644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x966928307773671f%3A0xe43f8759cf5e3e56!2sCarlos%20Ambrosio%20Lozzier%20444%2C%20Chillan%2C%20Chill%C3%A1n%2C%20B%C3%ADo%20B%C3%ADo!5e0!3m2!1ses-419!2scl!4v1671140372553!5m2!1ses-419!2scl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

      

        


    </div>


    

      <a class="inline-block px-3 h-6 bg-600 text-white rounded-full"></a>
      <h3 class="  text-1xl text-dark leading-8 foont-bold mt-2" >INFORMACIÓN DE CONTACTO <br>
        
        TALLER MULTIMARCA
        <br> whatsapp +56935450163
       <br>Email: mecanicarioschillan@gmail.com
        <br>
        Facebook Mecanica Rios
        <br>
        HORARIO DE ATENCIÓN
        <br>
        Lunes A Viernes : 9:00 A 19:00 Horas.
        <br>
        Sábados De 9:00 A 13:00 Horas.
      </h3>
      
     
  

   


  </div>


</div>




<div class="mt-4">
  {{$posts->links()}}
</div>

</div>


<div style="background: white;" class="container pt-5">


  <a href="#" class="inline-block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mb-4">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Reparaciones Mecanicas Multimarca</h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">Reparaciones y mantenimiento mecanico general.</p>
</a>

<a href="#" class="inline-block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mb-4">
  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Reparaciones Electromecanicas Multimarca</h5>
  <p class="font-normal text-gray-700 dark:text-gray-400">Identificacion de fallas en los equipos electronicos.</p>
</a>

<a href="#" class="inline-block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mb-4">
  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Asistencia de compra y venta de vehiculos</h5>
  <p class="font-normal text-gray-700 dark:text-gray-400">Asistencia para compra de vehiculos online y en terreno.</p>
</a>

<br>

</div>

<br>

<footer class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
  <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://flowbite.com/" class="hover:underline">Mecanica Rios™</a>. All Rights Reserved.
  </span>
  <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
      <li>
          <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
      </li>
      <li>
          <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
      </li>
      <li>
          <a href="#" class="mr-4 hover:underline md:mr-6">Licensing</a>
      </li>
      <li>
          <a href="#" class="hover:underline">Contact</a>
      </li>
  </ul>
</footer>







</x-app-layout>
