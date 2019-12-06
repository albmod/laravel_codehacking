@extends('layouts.admin')




@section('content')


    <h1>Edit Category </h1>

    @if(count($errors)>0)
        <div class="alert alert-danger">

            <ul>

                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>

                @endforeach
            </ul>

        </div>

    @endif


    <div class="col-sm-9">
        <form action="{{route('admin.categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT"/>



            <div class="form-group">
                <label for="exampleInputname1">Category Name</label>
                <input type="text" class="form-control" id="exampleInputname1" aria-describedby="nameHelp" value="{{$category->name}}" name="name">
                <small id="nameHelp" class="form-text text-muted">Provide Your Full name</small>
            </div>


            <button value="Update" type="submit" class="col-sm-2 btn btn-primary ">Update Category</button>






        </form>

    </div>
@stop