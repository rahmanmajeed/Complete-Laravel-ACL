@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User List</div>

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
                <th>Email</th>
                <th>Role</th>
                <th>Permission</th>
                <th>Action</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->roles->implode('name', ', ')}}</td>
                <td>{{$user->user_permissions->implode('name', ', ')}}</td>
                <td>
                @permission('Role-Update')
                <a href="{{route('user.edit',$user->id)}}"><span class="btn btn-info">Edit</span></a>::
                @endpermission
                @permission('Role-Delete')
                <a href="#"><span class="btn btn-danger">Delete</span></a>
                @endpermission
                </td>
                @endforeach
                </tr>
                </tbody>
                </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
