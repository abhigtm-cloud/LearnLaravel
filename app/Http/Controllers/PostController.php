<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostControllerRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::latest()->simplePaginate(5); #use simplePaginate to change the style of the page
      
    //    dump($categories); #the page is visible  
   //    dd($categories); #it stands for dump and die....page doesnt visible after using it
    
    return view("post.index",["post"=> $post]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create',["categories"=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostControllerRequest $request)
    {
        // dump($request->all());
        // $data = $request->validate([
        //     // 'image'=>['required','image','mimes:jpg,jpeg,png,gif,svg','max:2048'],
        //     // 'title'=>['required'],
        //     // 'content'=>['required'],
        //     // 'category_id'=>['required','exists:categories,id']
        // ]);
        // dd($data);
        $data = $request->validated();

        $image = $data['image'];
        unset($data['image']);
        $data['user_id']=Auth::id();
        $data['slug']=Str::slug($data['title']);
        $imagePath = $image->store('posts','public');
        $data['image'] = $imagePath;
        Post::create($data);
       
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username ,Post $post)
    {
//         dd([
//     'title' => $post->title,
//     'slug' => $post->slug
// ]);
        // return $post->slug;
        return view('post.show',['post'=>$post]);
        // return redirect()->route('post.show');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
