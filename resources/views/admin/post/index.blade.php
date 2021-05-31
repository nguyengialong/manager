@extends('admin.layouts.master')
@section('title')
    Danh sách bài viết
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách bài viết</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Posts</a></li>
                    <li class="breadcrumb-item active">Danh sách bài viết</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bài viết mới đăng</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <th width="100px">Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Hình ảnh</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td width="100px">{{$value->title}}</td>
                                <td width="600px">{!!$value->content!!}</td>
                                <td><img src="uploads/{{$value->thumbnail}}" width="70px" height="70px"></td>
                                <td>
                                    <a href="{{route('edit_post',$value->id)}}" class="btn btn-success">Edit</a>
                                    <a href="{{route('delete_post',$value->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div>{{$data->links()}}</div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
