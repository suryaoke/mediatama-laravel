 @extends('frontend.frontend_master')

 @section('header')
     @include('frontend.body.header')
 @endsection

 @section('frontend')
     <section class="blog_area single-post-area section-padding">
         <div class="container">
             <div class="row">
                 <div class="col-lg-8 posts-list">
                     <div class="single-post">
                         <div class="feature-img">
                             <img class="img-fluid" src="{{ asset('storage/' . $artikel->foto) }}" alt="">
                         </div>
                         <div class="blog_details">
                             <h2>{{ $artikel->title }}
                             </h2>
                             <ul class="blog-info-link mt-3 mb-4">
                                 <li><a href="#"><i class="fa fa-user"></i> {{ $artikel->author->name }}</a></li>
                                 <li><a href="#"><i class="fa fa-comments"></i> {{ $artikel->kategoris->first()->name }} | {{ $artikel->tags->first()->name }}</a></li>
                             </ul>
                             <p class="excert">
                                 {{ $artikel->content }}
                             </p>

                         </div>
                     </div>

                 </div>


             </div>
         </div>
     </section>
 @endsection
