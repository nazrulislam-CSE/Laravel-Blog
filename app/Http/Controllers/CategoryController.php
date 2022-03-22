<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
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
        $allcate = Category::all();

        if($allcate->count() == 0 ){
            Session::flash('info', 'There are no Category Yet.');
            return redirect()->route('create.category');
        }
        return view('admin.category.all_category')->with('categories',$allcate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*dd($request->all());*/
        $this->validate($request,[
            'name'=>'required'
        ]);
        $category = Category::create([
            'name'=>$request->name
        ]);
        /*$category = new Category;
        $category->name =$request->name;
        $category->save();*/
        Session::flash('creat','Category Created Successfully');
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
        $editcate = Category::find($id);
        return view('admin.category.edit_category')->with('categories',$editcate);
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
        $updatecate = Category::find($id);
        $this->validate($request, [
            'name' => "required"
        ]);
        $updatecate->name =$request->name;
        $updatecate->save();
        Session::flash('update', "Category Successfully Update");
        return redirect()->route('all.cate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delcate = Category::find($id);
        $delcate->delete();
        Session::flash('deletecate','Category Deleted Successfully');
        return redirect()->back();
    }
}
