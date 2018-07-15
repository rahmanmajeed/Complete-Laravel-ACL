@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <table class="table table-bordered">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </thead>
                <tbody>
                 @foreach($permissions as $permission)
                 <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$permission->name}}</td>
                  <td>{{$permission->description}}</td>
                  <td>
                  @permission('Role-Update')
                  <a href="{{route('permission.edit',$permission->id)}}"><span class="btn btn-info">Edit</span></a>::
                  @endpermission
                  @permission('Role-Delete')
                  <a href="#"><span class="btn btn-danger">Delete</span></a></td>
                  @endpermission
                 </tr>
                 @endforeach
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
