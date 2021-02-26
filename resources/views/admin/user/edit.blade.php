@extends('admin.layouts.master')
@section('title')
    Sửa thông tin người dùng
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> Sửa thông tin người dùng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active">Sửa thông tin</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sửa thông tin  người dùng</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form"  action="{{route('update_user',$users->id)}}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input type="text" class="form-control" id=""  name="name" placeholder="Tên người dùng" value="{{$users->name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" id="" placeholder="Email" value="{{$users->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="number" class="form-control" id="" name="phone" placeholder="Nhập vào số điện thoại" value="{{$users->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" class="form-control" id="" name="address" placeholder="Nhập vào địa chỉ" value="{{$users->address}}">
                        </div>
                       @if(!empty($role[0]))
                        <div class="form-group">
                            <label for="exampleInputEmail1">Role</label>
                            <input type="text" class="form-control" id=""  name="role" placeholder="Tên người dùng" value="{{$role[0]}}">
                        </div>
                        @endif
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">

                        <a><button type="submit" class="btn btn-success">Update</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
