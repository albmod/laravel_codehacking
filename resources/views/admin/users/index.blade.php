@extends('layouts.admin')




@section('content')

@if(Session::has('deleted_user'))


    <p class="bg-danger">{{session('deleted_user')}}</p>
@endif
    <h1>User List</h1>


<table class="table table-striped">
  <thead>
    <tr>
         <th scope="col">Id</th>
         <th scope="col">Photo</th>
         <th scope="col">Name</th>
         <th scope="col">Email</th>
         <th scope="col">Status</th>
         <th scope="col">Role Name</th>
         <th scope="col">Create date</th>
         <th scope="col">Update date</th>
    </tr>
  </thead>
  <tbody>
  @if(count($users)>0)
  @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>

        <td><img height="50" src="{{$user->photo->path}}"></td>
      <td><a href="{{route('admin.users.edit',$user->id)}}" >  {{$user->name}}</a></td>
      <td>{{$user->email}}</td>
      <td>{{$user->is_active==1?"Active":"Not Active"}}</td>
      <td>{{$user->role->name}}</td>
      <td>{{$user->created_at->diffforhumans()}}</td>
      <td>{{$user->updated_at->diffforhumans()}}</td>
    </tr>

 @endforeach
    @endif
  </tbody>
</table>

@stop