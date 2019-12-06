<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __construct()
//    {
//        $this->middleware('admin');
//    }


    public function index()
    {
        $users=User::orderBy('id', 'ASC')->get();
        return view('admin.users.index',compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('admin.users.create',compact(['roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {

        $input=$request->all();  //create array


        if(trim($request->password)=='')
        {

            $input= $request->except('password');
        }
        else {
            $input=$request->all();
            $input['password']=bcrypt($request->password);
        }

        if($file=$request->file('photo_id'))
        {
            $name=time().$file->getClientOriginalName();
            $photo=Photo::create(['path'=>$name]);
            $file->move('images',$name);
            $input['photo_id']=$photo->id;
        }


        User::create($input);
        return redirect('admin/users');
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
        $roles=Role::all('id','name');

        $user=User::findOrfail($id);
        return view('admin.users.edit',compact(['user','roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        // return $request->all();
        $input=$request->all();
        $user=User::findorfail($id);

        if(trim($request->password)=='')
        {

            $input= $request->except('password');
        }
        else {
            $input=$request->all();
            $input['password']=bcrypt($request->password);
        }


        if($file=$request->file('photo_id'))
        {
            $name=time().$file->getClientOriginalName();
            $photo=Photo::create(['path'=>$name]);
            $file->move('images',$name);
            $input['photo_id']=$photo->id;
        }

        $user->update($input);
        return redirect('admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if($user->photo->path!='/images/user.png'){
            unlink(public_path() . $user->photo->path);
        }



        $user->delete();

        Session::flash('deleted_user','the user has been deleted');
        return redirect('admin/users');
    }
}
