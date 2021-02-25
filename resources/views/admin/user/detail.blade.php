@extends('admin.layouts.master')
@section('title')
Detail
@endsection
@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detail pages</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Users</a></li>
                <li class="breadcrumb-item active"> Detail</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>
<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thông tin  chi tiết</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form"  class="form-horizontal">
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
                </div>
                <!-- /.card-body -->

            </form>
        </div>
    </div>
</div>
@endsection
