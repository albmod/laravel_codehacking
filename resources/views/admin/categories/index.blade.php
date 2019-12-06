@extends('layouts.admin')




@section('content')


    <h1>Categories List</h1>


    <table class="table table-striped">
      <thead>
        <tr>
             <th scope="col">Id</th>
             <th scope="col">Name</th>
             <th scope="col">Create date</th>
             <th scope="col">Update date</th>
        </tr>
      </thead>
      <tbody>
      @if(count($categories)>0)
      @foreach($categories as $category)
        <tr>
          <th scope="row">{{$category->id}}</th>


          <td><a href="{{route('admin.categories.edit',$category->id)}}" >  {{$category->name}}</a></td>

          <td>{{$category->created_at->diffforhumans()}}</td>
          <td>{{$category->updated_at->diffforhumans()}}</td>
        </tr>

     @endforeach
        @endif
      </tbody>
    </table>



@stop