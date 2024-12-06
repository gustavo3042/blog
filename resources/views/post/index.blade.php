<x-app-layout>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <header class="bg-white shadow">
      <div class="container mx-auto flex justify-between items-center py-6 px-4">
          <div class="text-3xl font-bold">Mecánica Rios</div>
          <nav>
              <a href="{{ route('posts.sobreNosotros') }}" class="px-4 py-2 text-blue-600 hover:text-blue-800">Sobre Nosotros</a>
              <!-- Agrega más enlaces según sea necesario -->
          </nav>
      </div>
      <div class="relative w-full mx-auto">
          <div class="overflow-hidden relative h-64">
              <div id="carousel" class="flex transition-transform duration-300 h-full">
                  <div class="min-w-full flex-shrink-0 h-full">
                      <img src="https://cdnx.jumpseller.com/enchulauto/image/16953037/resize/540/540?1622849421" class="w-full h-full object-cover">
                  </div>
                  <div class="min-w-full flex-shrink-0 h-full">
                      <img src="https://i0.wp.com/unaaldia.hispasec.com/wp-content/uploads/2022/03/Toyota-Logo.png?fit=3840%2C2160&ssl=1" class="w-full h-full object-cover">
                  </div>
                  <div class="min-w-full flex-shrink-0 h-full">
                      <img src="https://upload.wikimedia.org/wikipedia/commons/1/13/Kia-logo.png" class="w-full h-full object-cover">
                  </div>
                  <div class="min-w-full flex-shrink-0 h-full">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEihQ3gkPJXmlCwbDRF2jQEHERtoLVCCL9t8UqlUu7g7teLGQ3Yc2IZUZL9ryNEwqu8-7hD2DyMS5rMqeM5J6n232fchkh-Z4E_Eef6TuiUqVSYvIY-Dv7RhFWUQkiDYPvp2-OxXndzSUOw/s1600/m7.jpg" class="w-full h-full object-cover">
                </div>
                <div class="min-w-full flex-shrink-0 h-full">
                  <img src="https://graffica.info/wp-content/uploads/2017/09/hyundai_logo.jpg" class="w-full h-full object-cover">
              </div>

              <div class="min-w-full flex-shrink-0 h-full">
                <img src="https://www.chevrolet.cl/content/dam/chevrolet/south-america/chile/espanol/index/index-subcontent/2023/drp-home/catwalks/catwalk-solicita-una-cotizacion.jpg?imwidth=960" class="w-full h-full object-cover">
            </div>

            <div class="min-w-full flex-shrink-0 h-full">
              <img src="https://cdn.freelogovectors.net/wp-content/uploads/2023/05/peugeot-logo-03-freelogovectors.net_.png" class="w-full h-full object-cover">
          </div>

          <div class="min-w-full flex-shrink-0 h-full">
            <img src="https://static.vecteezy.com/system/resources/previews/020/499/800/non_2x/citroen-brand-new-logo-car-symbol-name-black-design-french-automobile-illustration-free-vector.jpg" class="w-full h-full object-cover">
        </div>
              
                  <!-- Agrega más imágenes según sea necesario -->
              </div>
          </div>
          <div class="absolute inset-0 flex justify-between items-center px-4">
              <button id="prevButton" class="bg-gray-800 bg-opacity-50 text-white px-2 py-1 rounded-full">
                  &#10094;
              </button>
              <button id="nextButton" class="bg-gray-800 bg-opacity-50 text-white px-2 py-1 rounded-full">
                  &#10095;
              </button>
          </div>
          <div class="absolute bottom-0 left-0 right-0 flex justify-center space-x-2 p-2">
              <button data-slide="0" class="w-3 h-3 rounded-full bg-gray-400"></button>
              <button data-slide="1" class="w-3 h-3 rounded-full bg-gray-400"></button>
              <button data-slide="2" class="w-3 h-3 rounded-full bg-gray-400"></button>
              <button data-slide="3" class="w-3 h-3 rounded-full bg-gray-400"></button>
              <button data-slide="4" class="w-3 h-3 rounded-full bg-gray-400"></button>
              <button data-slide="5" class="w-3 h-3 rounded-full bg-gray-400"></button> 
              <button data-slide="6" class="w-3 h-3 rounded-full bg-gray-400"></button> 
              <button data-slide="7" class="w-3 h-3 rounded-full bg-gray-400"></button> 
              <!-- Agrega más botones según sea necesario -->
          </div>
      </div>
  </header>

  <br>

  <div class="container mx-auto py-8">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach ($posts as $post)
          <article class="bg-white shadow-md rounded-lg overflow-hidden">
              <div class="bg-cover bg-center h-48" style="background-image: url('{{ $post->image ? asset('storage/'.$post->image->url) : 'https://cdn.pixabay.com/photo/2021/05/27/20/53/field-6289253_960_720.jpg' }}')"></div>
              <div class="p-4">
                  <div class="flex items-center mb-2">
                      @foreach ($post->tags as $tag)
                      <a href="{{ route('posts.tag', $tag) }}" class="bg-{{ $tag->color }}-600 text-white rounded-full px-3 py-1 text-xs mr-2">{{ $tag->name }}</a>
                      @endforeach
                  </div>
                  <h2 class="text-xl font-bold mb-2">
                      <a href="{{ route('posts.shows', $post) }}">{{ $post->name }}</a>
                  </h2>
                  <p class="text-gray-600">{{ Str::limit($post->excerpt, 100) }}</p>
              </div>
          </article>
          @endforeach
      </div>
  </div>

  <div class="container mx-auto py-8">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div class="bg-white shadow-md rounded-lg p-6">
              <h3 class="text-2xl font-bold mb-4">Ubicación del Taller</h3>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d967.2835836475276!2d-72.10535166325568!3d-36.621683601440644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x966928307773671f%3A0xe43f8759cf5e3e56!2sCarlos%20Ambrosio%20Lozzier%20444%2C%20Chillan%2C%20Chill%C3%A1n%2C%20B%C3%ADo%20B%C3%ADo!5e0!3m2!1ses-419!2scl!4v1671140372553!5m2!1ses-419!2scl" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div class="bg-white shadow-md rounded-lg p-6">
              <h3 class="text-2xl font-bold mb-4">Información de Contacto</h3>
              <p>Whatsapp: +56935450163</p>
              <p>Email: mecanicarioschillan@gmail.com</p>
              <p>Facebook: Mecanica Rios</p>
              <p>Horario de Atención:</p>
              <p>Lunes a Viernes: 9:00 a 19:00</p>
              <p>Sábados: 9:00 a 13:00</p>
          </div>
          <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-2xl font-bold mb-4">Información de Contacto</h3>
            <p>Whatsapp: +56935450163</p>
            <p>Email: mecanicarioschillan@gmail.com</p>
            <p>Facebook: Mecanica Rios</p>
            <p>Horario de Atención:</p>
            <p>Lunes a Viernes: 9:00 a 19:00</p>
            <p>Sábados: 9:00 a 13:00</p>
        </div>
      </div>
  </div>

  <div class="container mx-auto p-5">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <a href="#" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Reparaciones Mecánicas Multimarca</h5>
              <p class="font-normal text-gray-700 dark:text-gray-400">Reparaciones y mantenimiento mecánico general.</p>
          </a>
          <a href="#" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Reparaciones Electromecánicas Multimarca</h5>
              <p class="font-normal text-gray-700 dark:text-gray-400">Identificación de fallas en los equipos electrónicos.</p>
          </a>
          <a href="#" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Asistencia de compra y venta de vehículos</h5>
              <p class="font-normal text-gray-700 dark:text-gray-400">Asistencia para compra de vehículos online y en terreno.</p>
          </a>
      </div>
  </div>

  <br>

  <footer class="bg-gray-800 text-gray-400 py-4">
      <div class="container mx-auto flex justify-between items-center">
          <span>&copy; 2022 Mecánica Ríos™. All Rights Reserved.</span>
          <ul class="flex space-x-4">
              <li><a href="#" class="hover:underline">About</a></li>
              <li><a href="#" class="hover:underline">Privacy Policy</a></li>
              <li><a href="#" class="hover:underline">Licensing</a></li>
              <li><a href="#" class="hover:underline">Contact</a></li>
          </ul>
      </div>
  </footer>

  <script>
      document.addEventListener('DOMContentLoaded', () => {
          const carousel = document.getElementById('carousel');
          const slides = document.querySelectorAll('#carousel > div');
          const prevButton = document.getElementById('prevButton');
          const nextButton = document.getElementById('nextButton');
          const buttons = document.querySelectorAll('[data-slide]');
          let currentSlide = 0;
          const totalSlides = slides.length;

          function showSlide(index) {
              carousel.style.transform = `translateX(-${index * 100}%)`;
              buttons.forEach((button, idx) => {
                  if (idx === index) {
                      button.classList.add('bg-blue-600');
                  } else {
                      button.classList.remove('bg-blue-600');
                  }
              });
          }

          function nextSlide() {
              currentSlide = (currentSlide + 1) % totalSlides;
              showSlide(currentSlide);
          }

          function prevSlide() {
              currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
              showSlide(currentSlide);
          }

          prevButton.addEventListener('click', prevSlide);
          nextButton.addEventListener('click', nextSlide);
          buttons.forEach((button, index) => {
              button.addEventListener('click', () => {
                  currentSlide = index;
                  showSlide(currentSlide);
              });
          });

          setInterval(nextSlide, 3000); // Cambia de imagen cada 3 segundos
      });
  </script>
</x-app-layout>
