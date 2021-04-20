<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->paginate(20);
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        // validation 
        $this->validate($request,[
            'title'   => 'required|unique:posts,title',
            'description'  => 'required',
            'category_id'  => 'required',
            'image'  => 'required',
        ]);

        // dd($request->all());


        // image 
        // if($request->hasFile('image')){
        //     $image = $request->file('image');
        //     $image_new_name = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move('storage/post/', $image_new_name);
        //     $post->image = '/storage/post/' . $image_new_name;
        //     $post->save();
        // }

    //    if($request->hasFile('image')){
    //        $image = $request->file('image');
    //        $imageNewName = time().'.'.$image->getClientOriginalExtension();
    //        $image->move('storage/post/',$imageNewName);
    //        $post->image = '/storage/post/'.$imageNewName;
    //        $post->save();
    //    }

        // save data 
        $post = Post::create([
            'title' => $request->title,
            'slug'  =>Str::slug($request->title),
            'category_id' => $request->category_id,
            'description' =>$request->description,
            'user_id'  => auth()->user()->id,
            'image'  => 'image.jpg',
            'published_at' =>Carbon::now(),
        ]);

         // image 
        // if($request->hasFile('image')){
        //     $productImage = $request->file('image');
        //     $imageName=time().'.'.$productImage->getClientOriginalExtension();
        //     // return $imageName;
        //     $directory = 'storage/post/';
        //     $productImage->move($directory,$imageName);
    
        //     $imageUrl = $directory.$imageName;
        //     $post->image = $imageUrl;
        //     $post->save();
        // }

        // if($request->hasFile('image')){
        //     $image = $request->file('image');
        //     $image_new_name = time().'.'.$image->getClientOriginalExtension();
        //     // return $image_new_name;
        //     $directory = 'storage/jabed/';
        //     $image->move($directory,$image_new_name);
        //     $post->image = $directory.$image_new_name;
        //     $post->save();
        // }

       if($request->hasFile('image')){
           $image = $request->file('image');
           $imageName = time().'.'.$image->getClientOriginalExtension();
           $directory = 'jabed/';
           $image->move($directory,$imageName);
           $post->image = $directory.$imageName;
           $post->save();
       }

        Session::flash('success','post create successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // return $post;
        $categories = Category::all();
        return view('admin.post.edit',compact(['categories','post']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        // return $post->id;
        // $this->validate($request, [
        //     'title' => "required|unique:posts,title, $post->id",
        //     'description' => 'required',
        //     'category' => 'required',
        // ]);
        
        // $post->title = $request->title;
        // $post->slug = Str::slug($request->title);
        // $post->description = $request->description;
        // $post->category_id = $request->category;

        // $post->tags()->sync($request->tags);

        // if($request->hasFile('image')){
        //     $image = $request->image;
        //     $image_new_name = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move('storage/post/', $image_new_name);
        //     $post->image = '/storage/post/' . $image_new_name;
        // }

        // $post->save();

        // Session::flash('success', 'Post updated successfully');
        // return redirect()->back();

        // validation 
        $this->validate($request,[
            // 'title' => "required|unique:posts,title, $post->id",
            'title' => "required|unique:posts,title, $post->id",
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->category_id = $request->category_id;

       if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $directory = 'jabed/';
            $image->move($directory,$imageName);
            $post->image = $directory.$imageName;
            $post->save();
       }

        Session::flash('success','post info updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
