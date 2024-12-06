@extends('frontend.frontend_master')

@section('header')
    @include('frontend.body.header')
@endsection

@section('frontend')
    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->

                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Top -->
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">
                                    <img src="{{ asset('storage/' . $artikelTerbaru->foto) }}" alt="">
                                    <div class="trend-top-cap">
                                        <span> {{ $artikelTerbaru->title }}</span>
                                        <span> {{ $artikelTerbaru->author->name }}</span>
                                        <h2><a href="{{ route('detail.kategori', $artikelTerbaru->id) }}">
                                                {{ $artikelTerbaru->content }}
                                            </a></h2>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Riht content -->
                        <div class="col-lg-4">
                            @foreach ($kategori as $key => $item)
                                <div class="trand-right-single d-flex">
                                    <div class="trand-right-img">
                                        <img src="{{ asset('frontend/assets/img/trending/right1.jpg') }}" alt="">
                                    </div>
                                    <div class="trand-right-cap">

                                        <h4><a href="/"> {{ $item->name }} </a></h4>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->


        <!--   Weekly2-News start -->
        <div class="weekly2-news-area  weekly2-pading gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Top News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @foreach ($artikel as $key => $item)
                                <div class=" dot-style d-flex dot-style">
                                    <div class="weekly2-single">
                                        <div class="weekly2-img">
                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="">
                                        </div>
                                        <div class="weekly2-caption">
                                            <span class="color1"> {{ $item->title }}</span>
                                            <p> {{ $item->author->name }}</p>
                                            <p> {{ $item->kategoris->first()->name }} | {{ $item->tags->first()->name }}
                                            </p>

                                            <h4><a href="{{ route('detail.kategori', $item->id) }}"> {{ $item->content }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->



    </main>
@endsection
