@extends('blog.layouts.master')
@section('title')
    About
@endsection
@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url(blogpage/blog/images/bg_4.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread">About Us</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{route('blog_home')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us<i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-counter ftco-section ftco-no-pt ftco-no-pb img" id="section-counter">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 d-flex">
                    <div class="img d-flex align-self-stretch" style="background-image:url(blogpage/blog/images/about.jpg);"></div>
                </div>
                <div class="col-md-6 pl-md-5 py-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h2 class="mb-4"><span>About Stories</span></h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center py-5 bg-light mb-4">
                                <div class="text">
                                    <strong class="number" data-number="10">0</strong>
                                    <span>Years of Experienced</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center py-5 bg-light mb-4">
                                <div class="text">
                                    <strong class="number" data-number="200">0</strong>
                                    <span>Foods</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center py-5 bg-light mb-4">
                                <div class="text">
                                    <strong class="number" data-number="300">0</strong>
                                    <span>Lifestyle</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center py-5 bg-light mb-4">
                                <div class="text">
                                    <strong class="number" data-number="40">0</strong>
                                    <span>Happy Customers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pt ftco-section-about ftco-no-pb bg-darken">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-9 order-md-last img py-5" style="background-image: url(blogpage/blog/images/bg_3.jpg);"></div>

                <div class="col-sm-6 col-md-6 col-lg-3 py-4 text d-flex align-items-center ftco-animate">
                    <div class="text-2 py-5 px-4">
                        <p class="mb-5"><a href="https://vimeo.com/45830194" class="btn-custom popup-vimeo">Watch Video <span class="ion-ios-play ml-4"></span></a></p>
                        <h1 class="mb-5">Roger <br> Bosch</h1>
                        <p class="mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <span class="signature">Roger.Bosch</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
