@extends('blog.layouts.master')
@section('title')
    Detail
@endsection
@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('uploads/{{$post->thumbnail}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h1 class="mb-3 bread">{{$post->title}}</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{route('blog_home')}}">Home<i class="ion-ios-arrow-forward"></i></a></span>
                        <span>
                            <i class="ion-ios-arrow-forward"></i>
                            @foreach($categories as $value)
                                @if($post->category_id === $value->id)
                                    {{$value->name}}
                                @endif
                            @endforeach
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-last ftco-animate">
                    <h2 class="mb-3">{{$post->title}}</h2>
                    <p>
                        <img src="uploads/{{$post->thumbnail}}" alt="" class="img-fluid">
                    </p>
                    <p>{!!$post->content!!}</p>


                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            <a class="tag-cloud-link">Life</a>
                            <a class="tag-cloud-link">Sport</a>
                            <a class="tag-cloud-link">Tech</a>
                            <a  class="tag-cloud-link">Travel</a>
                        </div>
                    </div>

                    <div class="about-author d-flex p-4 bg-light">
                        <div class="bio mr-5">
                            <img src="blogpage/blog/images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
                        </div>
                        <div class="desc">
                            <h3>{{Auth::user()->name}}</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                        </div>
                    </div>


                    <div class="pt-5 mt-5">


                        <h3 class="mb-5">{{count($comments)}} Comments</h3>

                        <ul class="comment-list">
                            @foreach($comments as $value)
                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src="blogpage/blog/images/person_1.jpg" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h2 id="{{$value->id}}">{{strtoupper($value->role)}}</h2>
                                        <h3 id="{{$value->id}}">{{$value->name}}</h3>
                                        <div class="meta" id="{{$value->id}}">{{date('d-m-y H:i:s',strtotime($value->created_at))}}</div>
                                        <p id="{{$value->id}}">{{$value->message}}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Comment post</h3>
                            @guest
                                <p>Bạn chưa đăng nhập. Vui lòng đăng nhập</p>
                                <a href="{{route('login')}}">Login</a>
                            @else
                                <form action="{{route('store_comments',$post->id)}}" method="post" class="p-5 bg-light">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="message">Comment in here</label>
                                        <textarea name="comment" id="content" cols="30" rows="10" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"  id= "addcoment" data-id="{{$post->id}}"  class="btn py-3 px-4 btn-primary">Submit</button>
                                    </div>

                                </form>
                            @endguest
                        </div>
                    </div>

                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar pr-lg-5 ftco-animate">
                    <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon icon-search"></span>
                                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <ul class="categories">
                            <h3 class="heading mb-4">Categories</h3>
                            @foreach($categories as $value)
                                <li><a href="{{$value->id}}">{{$value->name}}</a></li>
                            @endforeach


                        </ul>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading mb-4">Popular Blog</h3>
                        @foreach($most_view as $value)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url(uploads/{{$value->thumbnail}});"></a>
                                <div class="text">
                                    <h3><a href="{{route('detail',$value->id)}}">{{$value->title}}</a></h3>
                                    <div class="meta">
                                        <div><a ><span class="icon-calendar"></span> {{$value->created_at}}</a></div>
                                        <div><a ><span class="far fa-eye"></span> {{$value->view_count}}</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading mb-4">Tag Cloud</h3>
                        <div class="tagcloud">
                            <a class="tag-cloud-link">dish</a>
                            <a class="tag-cloud-link">menu</a>
                            <a class="tag-cloud-link">food</a>
                            <a class="tag-cloud-link">sweet</a>
                            <a class="tag-cloud-link">tasty</a>
                            <a class="tag-cloud-link">delicious</a>
                            <a class="tag-cloud-link">desserts</a>
                            <a class="tag-cloud-link">drinks</a>
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading mb-4">Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                    </div>
                </div>

            </div>
        </div>
    </section> <!-- .section -->

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.0.1/socket.io.js" integrity="sha512-q/dWJ3kcmjBLU4Qc47E4A9kTB4m3wuTY7vkFJDTZKjTs8jhyGQnaUrxa0Ytd0ssMZhbNua9hE+E7Qv1j+DyZwA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var connectionOptions = {
        "force new connection": true,
        "reconnectionAttempts": "Infinity",
        "timeout": 1000,
        "transports": ["websocket"]
    };
    var socket = io('http://127.0.0.1:3000', connectionOptions);
    socket.on('laravel_database_chat:message', function (data) {
        console.log(data)
        var date = new Date(data.created_at);
        if ($('#' + data.id).length === 0) {
            $('.comment-list').append('' +
                '<li class="comment"><div class="vcard bio">' +
                '<img src="blogpage/blog/images/person_1.jpg" alt="Image placeholder">' +
                '</div><div class="comment-body">' +
                '<h2>' + data.role.toUpperCase() + '</h2>' +
                '<h3>' + data.name + '</h3>' +
                '<div class="meta">' + date.toISOString().substr(0,10)  + '</div>' +
                '<p>' + data.message + '</p><p>' +
                '<a class="reply">Reply</a></p></div></li>');
        }else{
            console.log('Sent')
        }
    })
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $(document).on('click', '#addcoment', function(e) {

        e.preventDefault();

        var id = $(this).attr('data-id');
        var content =  $('#content').val();


        $.ajax({

            type: 'post',
            url: "comment/add/"+id,
            data:{
                message : content,
                id : id,

            },
            success: function (res) {
                console.log(res.data)
                // if ($('#' + res.data.id).length === 0) {
                //     $('.comment-list').append('' +
                //         '<li class="comment"><div class="vcard bio">' +
                //         '<img src="blogpage/blog/images/person_1.jpg" alt="Image placeholder">' +
                //         '</div><div class="comment-body">' +
                //         '<h2>' + res.data.role.toUpperCase() + '</h2>' +
                //         '<h3>' + res.data.name + '</h3>' +
                //         '<div class="meta">' + new Date(res.data.created_at).getDate() + '</div>' +
                //         '<p>' + res.data.message + '</p><p>' +
                //         '<a class="reply">Reply</a></p></div></li>');
                // }else{
                //     console.log('Sent')
                // }
            },

            error: function (error) {
                console.log(error)
            }
        })

    })

</script>
@endsection
