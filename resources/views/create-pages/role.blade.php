@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#9e9e9e">Create New Role</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->

                  <form action="{{route('role.store')}}" method="post">
                  @csrf
                  <div class="row">
                   <div class="col-md-3"></div>
                   <div class="col-md-6">
                    <div class="form-group {{$errors->has('name')? 'has-error' : ''}}">
                     <label for="">Role Name</label>
                     <input type="text" name="name" id="" class="form-control">
                     <span class="text-danger">{{$errors->first('name')}}</span>
                    </div>
                   </div>
                  </div>
                  <div class="row">
                   <div class="col-md-3"></div>
                   <div class="col-md-6">
                    <div class="form-group {{$errors->has('slug') ? 'has-error' : ''}}">
                     <label for="">Role Slug</label>
                     <input type="text" name="slug" id="" class="form-control"><p>(must be Unique)</p>
                     <span class="text-danger">{{$errors->first('slug')}}</span>
                    </div>
                   </div>
                  </div>
                  <div class="row">
                   <div class="col-md-3"></div>
                   <div class="col-md-6">
                    <div class="form-group {{$errors->has('desp') ? 'has-error' : ''}}">
                     <label for="">Role Description</label><br>
                     <textarea name="desp" id="" cols="45" rows="5"></textarea>
                     <span class="text-danger">{{$errors->first('desp')}}</span>
                    </div>
                   </div>
                  </div>

                  <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                   <label for="permissions">Permissions</label><br>
                   <select name="permission[]" id="" multiple="multiple">
                    @foreach($permissions as $permission)
                    <option value="{{$permission->id}}">{{$permission->name}}</option>
                    @endforeach
                   </select>
                  </div>
                  </div>

                  <div class="row">
                   <div class="col-md-3"></div>
                   <div class="col-md-3">
                    <div class="form-group">
                     <input type="submit" name="" id="" class="form-control btn btn-primary" value="Create" >
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