@extends('layouts.admin')




@section('content')


    <h1>Posts List</h1>


    <table class="table table-striped">
      <thead>
        <tr>
             <th scope="col">Id</th>
            <th scope="col">Owner</th>
            <th scope="col">Category</th>
             <th scope="col">Photo</th>
             <th scope="col">Title</th>
             <th scope="col">Body</th>


             <th scope="col">Create date</th>
             <th scope="col">Update date</th>
        </tr>
      </thead>
      <tbody>
      @if(count($posts)>0)
      @foreach($posts as $post)
        <tr>
          <th scope="row">{{$post->id}}</th>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category->name}}</td>
            <td><img height="50" src="{{$post->photo->path}}"></td>
          <td><a href="{{route('admin.posts.edit',$post->id)}}" >  {{$post->title}}</a></td>
          <td>{{$post->body}}</td>

          <td>{{$post->created_at->diffforhumans()}}</td>
          <td>{{$post->updated_at->diffforhumans()}}</td>
        </tr>

     @endforeach
        @endif
      </tbody>
    </table>



@stop