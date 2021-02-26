@extends('admin.layouts.master')
@section('title')
    Thêm mới Role
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> Thêm mới Role</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active">Thêm mới</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tạo Role</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form"  action="{{route('storeRole')}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}


                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input type="text" class="form-control" id=""  name="name" placeholder="Tên role" required>
                        </div>

                        <div data-init-function="bpFieldInitChecklist" class="form-group col-sm-12" element="div" data-initialized="true">    <label>Permissions</label>

                            <input type="hidden" value="[]" name="permissions">

                            <div class="row">
                                @if(!empty($permission))
                                    @foreach($permission as $value)
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label class="font-weight-normal">
                                                <input type="checkbox" value="{{$value->id}}" name="{{$value->name}}"> {{$value->name}}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>


                        </div>


                        <button type="submit" class="btn btn-success">Tạo mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
