@extends('admin.layouts.master')
@section('title')
    Import Excel
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Import Excel</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active">Import Excel</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <form action="{{route('importExcelData')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" required>
                    <br>
                    <br>
                    <button class="btn btn-primary" type="submit">Import Data</button>
                </form>
            </div>
        </div>
    </div>

@endsection
