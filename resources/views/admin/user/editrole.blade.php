@extends('admin.layouts.master')
@section('title')
    Edit Role
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> Edit Role</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">EditRole</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form"  action="{{route('updateRole',$roles->id)}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}


                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input type="text" class="form-control" id="" value="{{$roles->name}}" name="name" placeholder="Tên role" required>
                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer">

                            <button type="submit" class="btn btn-success">Tạo mới</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
