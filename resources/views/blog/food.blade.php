@extends('blog.layouts.master')
@section('title')
    Foods
@endsection
@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('blogpage/blog/images/bg_4.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread">Foods</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{route('blog_home')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>All Post</span></p>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h2 class="mb-4"><span>All Post</span></h2>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($posts as $value)
                            <div class="col-md-4 ftco-animate">
                                <div class="blog-entry">
                                    <a href=" {{route('detail',$value->id)}}" class="img-2"><img src="uploads/{{$value->thumbnail}}" alt="Colorlib Template"  width="270px" height="180px"></a>
                                    <div class="text pt-3">
                                        <p class="meta d-flex"><span class="pr-3">Dessert</span><span class="ml-auto pl-3">{{$value->created_at}}</span></p>
                                        <h3>
                                            <a href="{{route('detail',$value->id)}}">{{$value->title}}</a>
                                            <div><a><i class="far fa-eye"></i> {{$value->view_count}}</a></div>
                                        </h3>
                                        <p class="mb-0"><a href="{{route('detail',$value->id)}}" class="btn btn-black py-2">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                                <ul>
                                    <li>{{$posts->links()}}</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="sidebar-wrap">
                        <div class="sidebar-box p-4 about text-center ftco-animate">
                            <h2 class="heading mb-4">About Me</h2>
                            <img src="blogpage/blog/images/author.jpg" class="img-fluid" alt="Colorlib Template">
                            @if(Auth::check())
                                <div class="text pt-4">
                                    <p>Hi! My name is <strong>{{Auth::user()->name}}</strong>, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                </div>
                            @endif
                        </div>
                        <div class="sidebar-box p-4 ftco-animate">
                            <form action="#" class="search-form">
                                <div class="form-group">
                                    <span class="icon icon-search"></span>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                            </form>
                        </div>
                        <div class="sidebar-box categories text-center ftco-animate">
                            <h2 class="heading mb-4">Categories</h2>
                            <ul class="category-image">
                                @foreach($categories as $value)
                                    <li>
                                        <a href="{{$value->id}}" class="img d-flex align-items-center justify-content-center text-center" style="background-image: url(public/uploads/{{$value->thumbnail}});">
                                            <div class="text">
                                                <h3>{{$value->name}}</h3>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
