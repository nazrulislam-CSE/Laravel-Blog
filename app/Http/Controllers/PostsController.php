<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Category;
use App\Models\Tags;
use Auth;
use Session;

class PostsController extends Controller
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
        $allpost = Posts::all();
        return view('admin.post.all_post')->with('posts',$allpost);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allcate = Category::all();
        $tags = Tags::all();

        if($allcate->count() == 0){
            Session::flash('info','you must have some categories before attemping create post');
            return redirect()->back();
        }
        return view('admin.post.create_post')
                            ->with('categories',$allcate)
                            ->with('tags',$tags);
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
            'title'        =>'required',
            'content'      =>'required',
            'category_id'  =>'required',
            'featured'     =>'required',
            'tags'         =>'required'
        ]);

        $str = $request->title;
        $slug = trim(preg_replace('/\s+/', '-', $str));

        /*$featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);*/

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        $post = Posts::create([
            'title'       => $request->title,
            'slug'        => $slug,
            'content'     => $request->content,
            'category_id' => $request->category_id,
            'featured'    =>'uploads/posts/'.$featured_new_name,
            'user_id'     => Auth::user()->id
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('creatpost','Post Created Successfully');
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
        $post = Posts::find($id);
        $allcate = Category::all();
        return view('admin.post.edit_post')
                            ->with('posts', $post)
                            ->with('categories', $allcate)
                            ->with('tags', Tags::all());
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
        $post = Posts::find($id);
        $this->validate($request,[
            'title'       => 'required',
            'featured'    => 'required',
            'category_id' => 'required',
            'content'     => 'required'
        ]);
        $str  = $request->title;
        $slug = trim(preg_replace('/\s+/', '-', $str));

        if($request->hasfile('featured')){

            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured ='uploads/posts/'.$featured_new_name;
        }

        $post->title = $request->title;
        $post->slug = $slug;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();

        $post->tags()->sync($request->tag);
        Session::flash('postupdate', 'Post Updated Successfully');
        return redirect()->route('all.post');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
        $post->delete();

        Session::flash('info', 'Post Moved To Trashed Successfully');
        return redirect()->back();
    }
    public function trashed(){
        $trashed = Posts::onlyTrashed()->get();
        return view('admin.post.trashed')->with('posts', $trashed);
    }
    public function restore($id){
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->restore();

        Session::flash('restore', 'Post Restore Successfully');
        return redirect()->back();
    }
    public function kill($id){
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        Session::flash('kill', 'Post Parmanently deleted Successfully');
        return redirect()->back();

    }
}