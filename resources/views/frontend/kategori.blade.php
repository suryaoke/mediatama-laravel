@extends('frontend.frontend_master')

@section('header')
    @include('frontend.body.header')
@endsection

@section('frontend')
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-3">
                            <div class="section-tittle mb-30">
                                <h3>Kategori</h3>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">
                                <!-- card one -->
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            @foreach ($kategori as $key => $item)
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="{{ asset('frontend/assets/img/news/whatNews1.jpg') }}"
                                                                alt="">
                                                        </div>
                                                        <div class="what-cap">

                                                            <h4><a href="#"> {{$item->name}} </a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- End Nav Card -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
