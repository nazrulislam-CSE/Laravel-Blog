<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tags;
use Session;

class TagController extends Controller
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
        $alltags = Tags::all();
        return view('admin.tags.all_tag')->with('tags',$alltags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create_tag');
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
            'name' => 'required'
        ]);
        $tags = Tags::create([
            'name' =>$request->name
        ]);
        Session::flash('createtags','Tags Created Successfully');
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
        $edittags = Tags::find($id);
        return view('admin.tags.edit_tag')->with('tags',$edittags);
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
        $updatetags = Tags::find($id);
        $this->validate($request,[
            'name' => 'required'
        ]);
        $updatetags->name = $request->name;
        $updatetags->save();
        Session::flash('tagsupdate','Tags Updated Successfully');
        return redirect()->route('all.tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deltags = Tags::find($id);
        $deltags->delete();
        Session::flash('deltags','Tags Deleted Successfully');
        return redirect ()->back();
    }
}
