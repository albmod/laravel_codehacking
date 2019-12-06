@extends('layouts.admin')




@section('content')


    <h1>Edit Posts </h1>

   @if(count($errors)>0)
         <div class="alert alert-danger">

             <ul>

                 @foreach($errors->all() as $error)
                 <li>{{$error}}</li>

                     @endforeach
             </ul>

         </div>

         @endif

    <div class="col-sm-3">

        <img src="{{$post->photo->path}}" class="img-responsive img-rounded">
    </div>
    <div class="col-sm-9">
<form action="{{route('admin.posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT"/>


    <div class="form-group">
        <label for="role">Category</label>
        <select class="form-control" id="inputGroupSelect02" name="category_id" >



            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected="selected"' : '' }}>
                    {{ $category->name }}
                </option>





            @endforeach
        </select>
    </div>
            <div class="form-group">
                <label for="exampleInputname1">title</label>
                <input type="text" class="form-control" id="exampleInputname1" aria-describedby="nameHelp" value="{{$post->title}}" name="title">
                <small id="nameHelp" class="form-text text-muted">Provide Your Full name</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Body</label>
                <textarea class="form-control" id="exampleFormControlTextarea3" rows="7" name="body">{{$post->body}}</textarea>


            </div>





            <div class="form-group">
                <label for="exampleInputfile">Upload image</label>
                <input type="file" class="form-control" id="exampleInputPhoto1" aria-describedby="emailHelp" value="{{$post->photo_id}}" name="photo_id">
                <small id="emailHelp" class="form-text text-muted">this to show your image</small>
            </div>



            <button value="Update" type="submit" class="col-sm-2 btn btn-primary ">Update Post</button>






        </form>

    </div>
@stop