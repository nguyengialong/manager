@extends('admin.layouts.master')
@section('title')
    Sửa bài viết
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Sửa bài viết</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Edit</a></li>
                    <li class="breadcrumb-item active"> Sửa bài viết</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sửa bài viết</h3>
                </div>
                <form role="form" method="POST" action="{{route('update_post',$posts->id)}}"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề bài viết</label>
                            <input type="text" name="title" class="form-control" id=""
                                   placeholder="Điền tiêu đề bài viết " value="{{$posts->title}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" name="slug" class="form-control" id="" placeholder="Slug "
                                   value="{{$posts->slug}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả bài viết</label>
                            <input type="text" name="description" class="form-control" id=""
                                   placeholder="Nội dung mô tả" value="{{$posts->description}}">
                        </div>
                        <div class="form-group">
                            <label>Thể loại bài viết</label>
                            <select class="form-control select2" style="width: 100%;" name="category_id">
                                <option>--Chọn Thể loại bài viết---</option>
                                @foreach($categories as $value)
                                    <option value="{{$value->id}}"
                                            @if($posts->category_id === $value->id) selected @endif>{{$value->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh bài viết</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile"
                                           value="{{$posts->thumbnail}}" multiple>
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung bài viết</label>
                            <textarea name="editor1" value="{{$posts->content}}">{!!$posts->content!!}</textarea>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="">
                                <button type="submit" class=" btn btn-success">Update</button>
                            </a>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
