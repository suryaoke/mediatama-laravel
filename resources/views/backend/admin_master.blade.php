<!DOCTYPE html>
<!--
Template Name: Icewall - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{ asset('backend/src/images/logo.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Icewall admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Icewall Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>
        @if (request()->routeIs('dashboard'))
            Dashboard
        @elseif (request()->routeIs('admin.kategori.all'))
            Kategori
        @elseif (request()->routeIs('admin.artikel.all'))
            Artikel
        @elseif (request()->routeIs('admin.tag.all'))
            Tag
        @elseif (request()->routeIs('admin.author.all'))
         Author
        @endif - CMS
    </title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/app.css') }}" />
    <!-- END: CSS Assets-->
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Tambahkan di bagian <head> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- END: Head -->

<body class="main">

    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Midone - HTML Admin Template" class="w-6"
                    src="{{ asset('backend/dist/images/logo.svg') }}">
            </a>
            <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <div class="scrollable">
            <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            <ul class="scrollable__content py-2">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="menu {{ request()->routeIs('dashboard') ? 'menu--active' : (request()->routeIs('profile') ? 'menu--active' : '') }}">
                        <div class="menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="menu__title"> Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.artikel.all') }}"
                        class="menu {{ request()->routeIs('admin.artikel.all') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-lucide="file"></i> </div>
                        <div class="menu__title"> Artikel </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.kategori.all') }}"
                        class="menu {{ request()->routeIs('admin.kategori.all') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trello">
                                <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                                <rect width="3" height="9" x="7" y="7" />
                                <rect width="3" height="5" x="14" y="7" />
                            </svg> </div>
                        <div class="menu__title"> Kategori </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.author.all') }}"
                        class="menu {{ request()->routeIs('admin.author.all') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-lucide="user"></i> </div>
                        <div class="menu__title"> Author </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.tag.all') }}"
                        class="menu {{ request()->routeIs('admin.tag.all') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-lucide="tag"></i> </div>
                        <div class="menu__title"> Tag </div>
                    </a>
                </li>


            </ul>
        </div>
    </div>
    <!-- END: Mobile Menu -->

    <!-- BEGIN: Top Bar -->
    @include('backend.body.header')
    <!-- END: Top Bar -->

    <div class="wrapper">
        <div class="wrapper-box">
            <!-- BEGIN: Side Menu -->
            @include('backend.body.sidebar')
            <!-- END: Side Menu -->

            <!-- BEGIN: Content -->
            <div class="content">
                @if (session('success'))
                    <div id="alert-success" class="mt-2 alert alert-success-soft show flex items-center mb-2"
                        role="alert">
                        <i data-lucide="check-circle" class="w-6 h-6 mr-2"></i> {{ session('success') }}
                    </div>
                @endif

                @yield('backend')

            </div>
            <!-- END: Content -->
        </div>
    </div>


    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="{{ asset('backend/dist/js/app.js') }}"></script>
    <!-- END: JS Assets-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var alert = document.getElementById('alert-success');
                if (alert) {
                    alert.style.opacity = '0';
                    setTimeout(function() {
                        alert.style.display = 'none';
                    }, 500); // Delay to match opacity transition
                }
            }, 2000); // 2 seconds
        });
    </script>
    <!-- Tambahkan sebelum penutup tag </body> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                // Anda bisa menambahkan opsi konfigurasi DataTable di sini jika perlu
                "paging": true, // Mengaktifkan fitur paging
                "searching": true, // Mengaktifkan fitur pencarian
                "info": true // Menampilkan informasi tabel
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image,#image2').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage,#showImage2').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>


</body>

</html>
