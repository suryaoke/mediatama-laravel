     @extends('backend.admin_master')
     @section('backend')
         @php
             $artikel = App\Models\Artikel::count();
             $author = App\Models\Author::count();

         @endphp
         <div class="grid grid-cols-12 gap-6">
             <div class="col-span-12 2xl:col-span-9">
                 <div class="grid grid-cols-12 gap-6">
                     <div class="col-span-12 mt-6 -mb-6 intro-y">
                         <div class="alert alert-dismissible show box bg-primary text-white flex items-center mb-6"
                             role="alert">
                             <span>Silahkan gunakan aplikasi dengan sebaik-baiknya, dan jaga kerahasiaan username dan
                                 password Anda..!!!</span>
                             <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close">
                                 <i data-lucide="x" class="w-4 h-4"></i>
                             </button>
                         </div>
                     </div>
                     <!-- BEGIN: General Report -->
                     <div class="col-span-12 mt-8">
                         <div class="intro-y flex items-center h-10">
                             <h2 class="text-lg font-medium truncate mr-5">
                                 General Report
                             </h2>
                             <a href="" class="ml-auto flex items-center text-primary">
                                 <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                             </a>
                         </div>
                         <div class="grid grid-cols-12 gap-6 mt-5">

                             <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                 <div class="report-box zoom-in">
                                     <div class="box p-5">
                                         <div class="flex">
                                             <i data-lucide="users"></i>
                                         </div>
                                         <div class="text-3xl font-medium leading-8 mt-6"> {{ $author }} </div>
                                         <div class="text-base text-slate-500 mt-1">Author</div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                 <div class="report-box zoom-in">
                                     <div class="box p-5">
                                         <div class="flex">
                                            <i data-lucide="file"></i>
                                         </div>
                                         <div class="text-3xl font-medium leading-8 mt-6"> {{ $artikel }} </div>
                                         <div class="text-base text-slate-500 mt-1">Artikel</div>
                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div>
                     <!-- END: General Report -->
                 </div>
             </div>
         </div>
     @endsection
