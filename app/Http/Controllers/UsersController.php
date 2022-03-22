<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Session;

class UsersController extends Controller
{
    public function __construct(){

        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alluser = User::all();
        return view('admin.user.all_user')->with('users',$alluser);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email'=>'required|email'
        ]);

        $user=User::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'password'=>bcrypt('12345678')
        ]);

        Profile::create([
            'user_id' =>$user->id,
            'avater'  =>'uploads/profile/profile.jpg',
            'about'  =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas officiis iste itaque et vel commodi nulla voluptate cupiditate debitis laborum?consectetur adipisicing elit. Voluptas officiis iste itaque et vel commodi nulla voluptate cupiditate debitis laborum?',
            'facebook'=>'https://www.facebook.com/',
            'youtube' =>'https://www.youtube.com/'
        ]);

        Session::flash('user','Users Created Successfully');
        return redirect()->back();
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
        //
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
        //
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

    public function admin($id)
    {
        $user = User::find($id);
        $user->admin = 1;
        $user->save();

        Session::flash('admin', 'Successfully Changed User Permission.');
        return redirect()->back();

    }

    public function not_admin($id){
        $user = User::find($id);
        $user->admin = 0;
        $user->save();

        Session::flash('not_admin', 'Successfully Changed User Permission.');
        return redirect()->back();
    }
}
