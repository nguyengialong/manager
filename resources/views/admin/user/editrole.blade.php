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
                            <div data-init-function="bpFieldInitChecklist" class="form-group col-sm-12" element="div" data-initialized="true">    <label>Permissions</label>


                                <div class="row">
                                    @if(!empty($permission))
                                        @foreach($permission as $value)
                                            <div class="col-sm-4">
                                                <div class="checkbox">
                                                    <label class="font-weight-normal">
                                                        <input type="checkbox" value="{{$value->id}}" name="permission[]"
                                                               @foreach($permissionOfRole as $key)
                                                                   @if($value->id==$key->id)
                                                                       checked
                                                                    @endif
                                                               @endforeach
                                                        > {{$value->name}}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach

                                    @endif
                                </div>

                            </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
