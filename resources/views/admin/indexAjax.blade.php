<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('List Users')}}</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($user as $value)

                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->address}}</td>
                            <td>{{$value->phone}}</td>

                            <td>

                                @can('detail user')
                                    <a href="{{route('detail_user',$value->id)}}" class="btn btn-success">Detail</a>
                                @endcan

                                @can('edit user')
                                    <a href="{{route('edit_user',$value->id)}}" class="btn btn-outline-primary">Edit</a>
                                @endcan

                                @can('delete user')
                                    <a href="{{route('delete_user',$value->id)}}" class="btn btn-danger">Delete</a>
                                @endcan


                            </td>
                    @endforeach
                    </tbody>
                </table>
                <div>{{$user->links()}}</div>
            </div>
        </div>
    </div>
</div>
