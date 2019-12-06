@extends('layouts.admin')




@section('content')


    <h1>Create Posts </h1>

       @if(count($errors)>0)
             <div class="alert alert-danger">

                 <ul>

                     @foreach($errors->all() as $error)
                     <li>{{$error}}</li>

                         @endforeach
                 </ul>

             </div>

             @endif

 <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
             {{csrf_field()}}

             <div class="form-group">
                 <label for="exampleInputname1">Created  by </label>
                 <input type="text" readonly class="form-control" id="exampleInputname1" aria-describedby="nameHelp"  value="{{auth()->user()->name}}" name="user_id" >

             </div>
             <div class="form-group">
                 <label for="role">Category</label>
                 <select class="form-control" id="inputGroupSelect02" name="category_id">
                     <option selected>Choose...</option>
                     @foreach($categories as $category)

                         <option value="{{$category->id}}">{{$category->name}}</option>

                     @endforeach
                 </select>
             </div>
             <div class="form-group">
                 <label for="exampleInputname1">Title</label>
                 <input type="text" class="form-control" id="exampleInputname1" aria-describedby="nameHelp" placeholder="Enter Your Title" name="title">
                 <small id="nameHelp" class="form-text text-muted">Provide Your title</small>
             </div>
             <div class="form-group">
                 <label for="exampleFormControlTextarea3">Body</label>
                 <textarea class="form-control" id="exampleFormControlTextarea3" rows="7" name="body"></textarea>
                 <small id="emailHelp" class="form-text text-muted">this email will be uniqe</small>
             </div>





             <div class="form-group">
                 <label for="exampleInputfile">Upload image</label>
                 <input type="file"  id="exampleInputphoto1" aria-describedby="emailHelp" placeholder="Enter email" name="photo_id">
                 <small id="emailHelp" class="form-text text-muted">this to show your image</small>
             </div>



           <button type="submit" class="btn btn-primary">Create post</button>
 </form>


@stop