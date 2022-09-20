 @php
     $menu_elements = [
         'Home' => [
             'text' => 'Inicio',
             'icon' => 'bi bi-house',
             'url' => route('admin-page'),
         ],
         'New Product' => [
             'text' => 'Crear producto',
             'icon' => 'bi bi-plus-square',
             'url' => route('create-product'),
         ],
     ];
 @endphp

 <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark vh-100 overflow-auto position-fixed">
     <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
         <i class="bi bi-shop m-2"></i> <span class="fs-4"> Control-Panel</span> </a>
     <hr>

     <ul class="nav nav-pills flex-column mb-auto">
         @foreach ($menu_elements as $element)
             @php
                 $text = $element['text'];
                 $icon = $element['icon'];
                 $url = $element['url'];
             @endphp
             <x-layout-admin.sidebar.menu-element :text="$text" :icon="$icon" :url="$url" />
         @endforeach
     </ul>

     <hr>
     <div class="dropdown">
         <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
             data-bs-toggle="dropdown" aria-expanded="false">
             <img src="https://github.com/mdo.png" alt="" class="rounded-circle me-2" width="32"
                 height="32">
             <strong>mdo</strong>
         </a>
         <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
             <li><a class="dropdown-item" href="#">New project...</a></li>
             <li><a class="dropdown-item" href="#">Settings</a></li>
             <li><a class="dropdown-item" href="#">Profile</a></li>
             <li>
                 <hr class="dropdown-divider">
             </li>
             <li><a class="dropdown-item" href="#">Sign out</a></li>
         </ul>
     </div>
 </div>
