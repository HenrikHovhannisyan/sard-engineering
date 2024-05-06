@extends('layouts.app')

@section('content')
    <section id="banner">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img
                        src="{{ asset('/img/banner/1.png') }}"
                        class="img-fluid" alt="">
                </div>
                <div class="swiper-slide">
                    <img
                        src="{{ asset('/img/banner/2.png') }}"
                        class="img-fluid" alt="">
                </div>
                <div class="swiper-slide">
                    <img
                        src="{{ asset('/img/banner/3.png') }}"
                        class="img-fluid" alt="">
                </div>
                <div class="swiper-slide">
                    <img
                        src="{{ asset('/img/banner/4.png') }}"
                        class="img-fluid" alt="">
                </div>
                <div class="swiper-slide">
                    <img
                        src="{{ asset('/img/banner/5.png') }}"
                        class="img-fluid" alt="">
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="autoplay-progress">
                <svg viewBox="0 0 48 48">
                    <circle cx="24" cy="24" r="20"></circle>
                </svg>
                <span></span>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1>Coming soon</h1>
            </div>
        </div>
    </div>
@endsection
