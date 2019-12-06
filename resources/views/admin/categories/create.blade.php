@extends('layouts.admin')




@section('content')


    <h1>Create Category </h1>

       @if(count($errors)>0)
             <div class="alert alert-danger">

                 <ul>

                     @foreach($errors->all() as $error)
                     <li>{{$error}}</li>

                         @endforeach
                 </ul>

             </div>

             @endif

 <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
             {{csrf_field()}}
             <div class="form-group">
                 <label for="exampleInputname1">Category Name</label>
                 <input type="text" class="form-control" id="exampleInputname1" aria-describedby="nameHelp" placeholder="Enter Your category" name="name">
                 <small id="nameHelp" class="form-text text-muted">Provide Your Categories</small>
             </div>


           <button type="submit" class="btn btn-primary">Create Category</button>
         </form>


@stop