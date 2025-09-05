<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClapController extends Controller
{
    public function clap(Post $post)
    {
        $post->claps()->create([
            'user_id' => Auth::user()->id,
        ]);
        return response()->json([
'clapsCount'=> $post->claps()->count(),
        ]);
    }
}
