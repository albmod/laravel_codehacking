@extends('layouts.admin')




@section('content')


    <h1>Users Edit</h1>

    <div class="row">

        @if(count($errors)>0)
            <div class="alert alert-danger">

                <ul>

                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>

                    @endforeach
                </ul>

            </div>

        @endif

    </div>

    <div class="col-sm-3">

        <img src="{{$user->photo->path}}" class="img-responsive img-rounded">
    </div>

    <div class="col-sm-9">

        <form action="{{route('admin.users.update',$user->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT"/>
            <div class="form-group">
                <label for="exampleInputname1">Name</label>
                <input type="text" class="form-control" id="exampleInputname1" aria-describedby="nameHelp" value="{{$user->name}}" name="name">
                <small id="nameHelp" class="form-text text-muted">Provide Your Full name</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->email}}" name="email">
                <small id="emailHelp" class="form-text text-muted">this email will be uniqe</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="If you don't want to change keep it blank"  name="password">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="inputGroupSelect02"  name="is_active">



                    <option  value ="1" @if($user->is_active == '1') selected="selected"  @endif >
                        Active
                    </option>

                    <option value ="0" @if($user->is_active == '0')  selected="selected"  value="0" @endif >
                        Not_Active
                    </option>



                </select>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="inputGroupSelect02" name="role_id" >



                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected="selected"' : '' }}>
                            {{ $role->name }}
                        </option>





                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="exampleInputfile">Upload image</label>
                <input type="file" class="form-control" id="exampleInputphoto1" aria-describedby="emailHelp" value="{{$user->photo_id}}" name="photo_id">
                <small id="emailHelp" class="form-text text-muted">this to show your image</small>
            </div>


            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button value="Update" type="submit" class="col-sm-2 btn btn-primary ">Update User</button>






        </form>

        <form  action="{{route('admin.users.destroy',$user->id)}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="DELETE"/>

            <input   class="btn btn-danger pull-right" type="submit" name="submit" value="DELETE"/>




        </form>
    </div>




@stop