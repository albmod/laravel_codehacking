<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Photo;
use App\Post;

use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('admin.posts.index',compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { $categories=Category::all();
        return view('admin.posts.create',compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {

        $input=$request->all();  //create array
        $input['user_id']=auth()->user()->id;




        if($file=$request->file('photo_id'))
        {
            $name=time().$file->getClientOriginalName();
            $photo=Photo::create(['path'=>$name]);
            $file->move('images',$name);
            $input['photo_id']=$photo->id;
        }


        Post::create($input);
        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all('id','name');

        $post=Post::findOrfail($id);
        return view('admin.posts.edit',compact(['post','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();
        $input=$request->all();
        $post=Post::findorfail($id);




        if($file=$request->file('photo_id'))
        {
            $name=time().$file->getClientOriginalName();
            $photo=Photo::create(['path'=>$name]);
            $file->move('images',$name);
            $input['photo_id']=$photo->id;
        }

        $post->update($input);
        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
