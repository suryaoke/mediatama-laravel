 <!-- BEGIN: Top Bar -->
 <div
     class="top-bar-boxed h-[70px] z-[51] relative border-b border-white/[0.08] mt-12 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
     <div class="h-full flex items-center">
         <!-- BEGIN: Logo -->
         <a href="" class="-intro-x hidden md:flex">
             <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('backend/dist/images/logo.svg') }}">
             <span class="text-white text-lg ml-3"> CMS</span>
         </a>
         <!-- END: Logo -->
         <!-- BEGIN: Breadcrumb -->
         <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
             <ol class="breadcrumb breadcrumb-light">
                 <li class="breadcrumb-item"><a href="#">Application</a></li>
                 <li class="breadcrumb-item active" aria-current="page">
                     @php
                         $slug = request()->route('slug');
                     @endphp
                     @if (request()->routeIs('dashboard'))
                         Dashboard
                     @elseif (request()->routeIs('admin.kategori.all'))
                         Kategori
                     @endif

                 </li>
             </ol>
         </nav>
         <!-- END: Breadcrumb -->


         <!-- BEGIN: Account Menu -->
         <div class="intro-x dropdown w-8 h-8">
             <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
                 role="button" aria-expanded="false" data-tw-toggle="dropdown">
                 <img alt="Midone - HTML Admin Template" src="{{ asset('backend/User-Profile-PNG.png') }}">
             </div>
             <div class="dropdown-menu w-56">
                 <ul
                     class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                     <li class="p-2">
                         <div class="font-medium">{{ Auth::user()->name }} </div>

                     </li>
                     <li>
                         <hr class="dropdown-divider border-white/[0.08]">
                     </li>
                     <li>
                         <a href="{{ route('profile') }}" class="dropdown-item hover:bg-white/5"> <i data-lucide="user"
                                 class="w-4 h-4 mr-2"></i> Profile </a>
                     </li>

                     <li>
                         <hr class="dropdown-divider border-white/[0.08]">
                     </li>
                     <li>
                         <form method="POST" action="{{ route('logout') }}">
                             @csrf

                             <button type="submit" class="dropdown-item hover:bg-white/5"> <i
                                     data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </button>
                         </form>

                     </li>
                 </ul>
             </div>
         </div>
         <!-- END: Account Menu -->
     </div>
 </div>
 <!-- END: Top Bar -->
