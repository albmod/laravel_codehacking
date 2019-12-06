@extends('layouts.admin')




@section('content')


    <h1>Create User</h1>

        @if(count($errors)>0)
            <div class="alert alert-danger">

                <ul>

                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>

                        @endforeach
                </ul>

            </div>

            @endif

  <form action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group">
                  <label for="exampleInputname1">Name</label>
                  <input type="text" class="form-control" id="exampleInputname1" aria-describedby="nameHelp" placeholder="Enter Your name" name="name">
                  <small id="nameHelp" class="form-text text-muted">Provide Your Full name</small>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                  <small id="emailHelp" class="form-text text-muted">this email will be uniqe</small>
            </div>
          <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
          </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="inputGroupSelect02" name="is_active">

                    <option value="1">Active</option>
                    <option selected value="0">Not Active</option>

                </select>
            </div>
          <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="inputGroupSelect02" name="role_id">
                            <option selected>Choose...</option>
                            @foreach($roles as $role)

                            <option value="{{$role->id}}">{{$role->name}}</option>

                            @endforeach
                        </select>
                    </div>


          <div class="form-group">
              <label for="exampleInputfile">Upload image</label>
              <input type="file" class="form-control" id="exampleInputphoto1" aria-describedby="emailHelp" placeholder="Enter email" name="photo_id">
              <small id="emailHelp" class="form-text text-muted">this to show your image</small>
          </div>


            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Create User</button>
          </form>

@stop