<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $tags = Tag::orderBy('created_at','DESC')->paginate(20);
        return view('admin.tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation 
        $this->validate($request,[
            'tag_name' => "required|unique:tags,tag_name",
        ]);

        // save data 
        $tag = new Tag;
        $tag->tag_name = $request->tag_name;
        $tag->description = $request->description;
        $tag->slug = Str::slug($request->tag_name,'-');

        $tag->save();

        Session::flash('success','Tag created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        // return $tag;

        return view('admin.tag.edit',compact('tag'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        // return $request->all();

         // validation 
         $this->validate($request,[
            'tag_name' => "required|unique:tags,tag_name,$tag->id"
        ]);

        // save info 
        $tag->tag_name = $request->tag_name;
        $tag->description = $request->description;
        $tag->slug = Str::slug($request->tag_name,'-');
        $tag->save();

        Session::flash('success','Tag info updated successfully');
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        // return $tag;
        
       if($tag){

           $tag->delete();

           Session::flash('success','tag deleted successfully');
           return redirect()->route('tag.index');
       }
    }
}
