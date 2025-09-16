<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostControllerRequest;
use App\Models\Category;
use App\Models\UserPost;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // DB::listen(function($query){
        //    Log::info($query->sql);
        // });
        $user = Auth::user();
       
        $query = UserPost::latest();
                         
        if($user){
            $ids = $user->following()->pluck("users.id");
            $query->whereIn("user_id", $ids);
            
            // Also eager load user's claps for these posts
            $query->with(['claps' => function($clapQuery) use ($user) {
                $clapQuery->where('user_id', $user->id);
            }]);
        }
        $post = $query->simplePaginate(5); #use simplePaginate to change the style of the page
      
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
     */    public function store(PostControllerRequest $request)
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
        UserPost::create($data);
       
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username ,UserPost $post)
    {
//         dd([
//     'title' => $post->title,
//     'slug' => $post->slug
// ]);
        // return $post->slug;
        return view('post.show',['post'=>$post]);
        
        // return redirect()->route('post.show');
        
    }
    public function category(Category $category){
        $user = Auth::user();
        
        $query = $category->posts()
                         ->with(['user', 'claps'])
                         ->withCount('claps')
                         ->latest();
                         
        if($user){
            // Eager load user's claps for these posts
            $query->with(['claps' => function($clapQuery) use ($user) {
                $clapQuery->where('user_id', $user->id);
            }]);
        }
        
        $post = $query->simplePaginate(5);
        return view("post.index",["post"=> $post]);
    }
    /**
     * Show the form for editing the specified resource.
     */
public function myPosts(User $user){
      $currentUser = Auth::user();
      
      $query = $user->posts()
                         ->with(['user', 'claps'])
                         ->withCount('claps')
                         ->latest();
                         
        if($currentUser){
            // Eager load current user's claps for these posts
            $query->with(['claps' => function($clapQuery) use ($currentUser) {
                $clapQuery->where('user_id', $currentUser->id);
            }]);
        }
        
        $post = $query->simplePaginate(5);
        return view("post.index",["post"=> $post]);
}

    public function edit(UserPost $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserPost $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserPost $post)
    {
        $post->delete();
        return redirect()->route('my.post', ['user' => Auth::user()->username]);
    }
}
