@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
       @permission('Role-Create') <a href="{{route('role.create')}}" class="btn btn-success">+ Create</a>@endpermission
            <div class="card">
                <div class="card-header">Roles</div>

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
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Permissions</th>
                    <th>Action</th>
                </thead>
                <tbody>
                 @foreach($roles as $role)
                 <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$role->name}}</td>
                  <td>{{$role->slug}}</td>
                  <td>{{$role->description}}</td>
                  <td>{{$role->role_permissions->implode('name', ', ')}}</td>
                  <td>
                  @permission('Role-Update')
                  <a href="{{route('role.edit',$role->id)}}"><span class="btn btn-info">Edit</span></a>::
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
