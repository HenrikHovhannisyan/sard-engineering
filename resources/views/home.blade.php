@extends('layouts.app')

@section('content')
    <section id="banner">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('/img/banner/1.png') }}" class="img-fluid" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('/img/banner/2.png') }}" class="img-fluid" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('/img/banner/3.png') }}" class="img-fluid" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('/img/banner/4.png') }}" class="img-fluid" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('/img/banner/5.png') }}" class="img-fluid" alt="">
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

    <section id="about_us">
        <h2 class="text-center mb-3">About us</h2>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 m-auto">
                    <div class="text-center mb-3">
                        <img src="{{ asset("/img/green-logo.png") }}" class="img-fluid" alt="">
                    </div>
                    <p>
                        <b>"Sard Engineering"</b> limited liability company is an industrial partner of <b>"Schneider
                            Electric"</b> company - the world leader in the field of energy - in the development,
                        manufacture and supply of distribution boards and automation system control panels.
                    </p>
                    <ul>
                        <li>
                            <p>
                                Production process automation: design, preparation of estimate documentation and
                                construction of control panels.
                            </p>
                        </li>
                        <li>
                            <p>
                                Design of distribution stations, equipment and main switchboards, preparation of
                                estimates and construction of the general distribution system.
                            </p>
                        </li>
                        <li>
                            <p>
                                Design of power supply internal networks for buildings and structures, preparation of
                                estimates and installation of the complete system from distribution boards to final
                                consumers.
                            </p>
                        </li>
                        <li>
                            <p>
                                Professional quality assessment of the operating power supply system according to
                                international standards and safety regulations.
                            </p>
                        </li>
                        <li>
                            <p>
                                Technical control of current and completed work (electrical distribution systems and
                                internal electrical networks).
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="our_works">
        <h2 class="text-center mb-3">Our works</h2>
        <div class="container">
            <div class="row">
                @foreach($our_works as $work)
                    <div class="col-6 col-md-3 d-flex justify-content-center align-items-center">
                        <img src="{{ asset("/uploaded/image/" . $work->image) }}" class="btn p-0 img-fluid shadow mb-3"
                             data-bs-toggle="modal" data-bs-target="#ourWorksModal"
                             data-bs-image="{{ asset("/uploaded/image/" . $work->image) }}">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Our Works Modal -->
    <div class="modal fade" id="ourWorksModal" tabindex="-1" aria-labelledby="ourWorksModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ourWorksModalLabel">Our work</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" id="modalImage">
                </div>
            </div>
        </div>
    </div>
@endsection
