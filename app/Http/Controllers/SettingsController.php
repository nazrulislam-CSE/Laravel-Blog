<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Session;

class SettingsController extends Controller
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
        $allsettings = Setting::all();
        return view('admin.settings.all_settings')->with('setting',$allsettings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('admin.settings.edit_settings')->with('setting', Setting::first());
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
        $this->validate($request,[
            'sitename'  => 'required',
            'title'     => 'required',
            'content'   => 'required',
            'contact'   => 'required',
            'email'     => 'required',
            'address'   => 'required'
        ]);

        $settings = Setting::first();

        $settings->site_name      = request()->sitename;
        $settings->title          = request()->title;
        $settings->content        = request()->content;
        $settings->contact_number = request()->contact;
        $settings->contact_email  = request()->email;
        $settings->address        = request()->address;

        $settings->save();
        Session::flash('settingupd','Setting All Information Successfully Updated');
        return redirect()->back();
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
