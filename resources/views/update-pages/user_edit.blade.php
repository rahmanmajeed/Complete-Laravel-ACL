@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="{{route('user.list')}}" class="btn btn-primary">Back</a>
            <div class="card">
                <div class="card-header">User Update</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <form action="{{route('user.update',$user->id)}}" method="post">
                   @csrf
                   <input type="hidden" name="_method" value="PUT">
                     <div class="row">
                        <div class="col-md-3"></div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="">User Name</label>
                                        <input type="text" name="name" id="" class="form-control" value="{{$user->name}}" readonly>
                               </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="">E-mail</label>
                                        <input type="text" name="" id="email" class="form-control" value="{{$user->email}}" readonly>
                               </div>
                            </div>
                        </div>
                    <div class="row">
                      <div class="col-md-12">
                      <table class="table table-bordered">
                      <thead>
                        <th>Roles</th>
                        <th colspan="10"></th>
                       </thead>
                       <tbody>
                        <tr>
                        <td></td>@foreach($roles as $role)<td >{{$role->name}}</td> @endforeach
                         </tr>
                         <tr>
                         <td></td>
                         @foreach($roles as $role)
                
                <td><input type="checkbox" name="role[]" value="{{$role->id}}" {{ $user->roles->contains($role) ? 'checked' : '' }}></td>
                    @endforeach
                         </tr>
                        </tbody>
                       </table>
                      </div>
                     </div>

                     <div class="row">
                      <div class="col-md-12">
                      <table class="table table-bordered">
                      <thead>
                        <th>Permissions</th>
                        <th colspan="10"></th>
                       </thead>
                       <tbody>
                        <tr>
                        <td></td>@foreach($permissions as $permission)<td >{{$permission->name}}</td> @endforeach
                         </tr>
                         <tr>
                         <td></td>
                         @foreach($permissions as $permission)
                
                <td><input type="checkbox" name="permission[]" value="{{$permission->id}}" {{ $user->user_permissions->contains($permission) ? 'checked' : '' }}></td>
                    @endforeach
                         </tr>
                        </tbody>
                       </table>
                      </div>
                     </div>
                     <div class="row">
                     <div class="col-md-3">
                     </div>
                     <div class="col-md-3">
                     <div class="form-control">
                     <input type="submit" value="Update" class="form-control btn btn-success">
                     </div>
                     </div>
                     </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
