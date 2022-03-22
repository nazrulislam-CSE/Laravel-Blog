<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\category;
use App\Models\Posts;
use App\Models\Tags;
use App\Models\User;
class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('FrontEnd.index')
                            ->with('site_name', Setting::first()->site_name)// ek row er jonno
                            ->with('title', Setting::first()->title)
                            ->with('content', Setting::first()->content)
                            ->with('contact_number', Setting::first()->contact_number)
                            ->with('contact_email', Setting::first()->contact_email)
                            ->with('address', Setting::first()->address)
                            ->with('categories',  category::take(5)->get())
                            ->with('first_post',  Posts::OrderBy('created_at','desc')->first())
                            ->with('second_post', Posts::OrderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                            ->with('third_post',  Posts::OrderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                            ->with('categoriesSec1', category::find(2))
                            ->with('categoriesSec2', category::find(6))
                            ->with('categoriesSec3', category::find(7));
    }

    public function singlePost($slug){


        $post = Posts::where('slug',$slug)->first();

        $counter = $post->views;
        $update_counter = $counter + 1;

        $post->views = $update_counter;
        $post->save();



        $next_id = Posts::where('id', '>', $post->id)->min('id');
        $prev_id = Posts::where('id', '<', $post->id)->max('id');
        return view('FrontEnd.single')
                            ->with('site_name', Setting::first()->site_name)
                            ->with('title', Setting::first()->title)
                            ->with('content', Setting::first()->content)
                            ->with('contact_number', Setting::first()->contact_number)
                            ->with('contact_email', Setting::first()->contact_email)
                            ->with('address', Setting::first()->address)
                            ->with('categories', category::take(5)->get())
                            ->with('post',$post)
                            ->with('next', Posts::find($next_id))
                            ->with('prev', Posts::find($prev_id))
                            ->with('counter', $update_counter);
    }

    public function category($id){

        $category = category::find($id);
        return view('FrontEnd.category')
                            ->with('category',$category)
                            ->with('site_name', Setting::first()->site_name)
                            ->with('title', Setting::first()->title)
                            ->with('content', Setting::first()->content)
                            ->with('contact_number', Setting::first()->contact_number)
                            ->with('contact_email', Setting::first()->contact_email)
                            ->with('address', Setting::first()->address)
                            ->with('categories', category::take(5)->get())
                            ->with('tags',Tags::all());
    }

    public function tag($id){

        $tags= Tags::find($id);
        return view('FrontEnd.tag')
                            ->with('tag',$tags)
                            ->with('categories', category::take(5)->get())
                            ->with('site_name', Setting::first()->site_name)
                            ->with('title', Setting::first()->title)
                            ->with('content', Setting::first()->content)
                            ->with('contact_number', Setting::first()->contact_number)
                            ->with('contact_email', Setting::first()->contact_email)
                            ->with('address', Setting::first()->address)
                            ->with('tags',Tags::all());
    }

    public function search(){

        $query = request('query');
        $posts = Posts::where('title','like','%'.$query.'%')->get();
        return view('FrontEnd.results')
                            ->with('posts', $posts)
                            ->with('query', $query)
                            ->with('site_name', Setting::first()->site_name)
                            ->with('title', Setting::first()->title)
                            ->with('content', Setting::first()->content)
                            ->with('contact_number', Setting::first()->contact_number)
                            ->with('contact_email', Setting::first()->contact_email)
                            ->with('address', Setting::first()->address)
                            ->with('categories', category::take(5)->get())
                            ->with('tags', Tags::all());
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
}
