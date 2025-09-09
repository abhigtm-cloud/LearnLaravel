<?php

namespace App\Http\Controllers;

use App\Models\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClapController extends Controller
{
    public function clap(UserPost $post)
    {
        try {
            // Check if user already clapped
            $existingClap = $post->claps()->where('user_id', Auth::id())->first();
            
            if ($existingClap) {
                // Remove clap if already exists
                $existingClap->delete();
                $hasClapped = false;
            } else {
                // Add new clap
                $post->claps()->create([
                    'user_id' => Auth::id(),
                ]);
                $hasClapped = true;
            }

            return response()->json([
                'clapsCount' => $post->claps()->count(),
                'hasClapped' => $hasClapped
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to process clap: ' . $e->getMessage()
            ], 500);
        }
    }

    public function clappost(UserPost $post)
    {
        try {
            // Check if user already clapped
            $existingClap = $post->claps()->where('user_id', Auth::id())->first();
            
            if ($existingClap) {
                // Remove clap if already exists
                $existingClap->delete();
                $hasClapped = false;
            } else {
                // Add new clap
                $post->claps()->create([
                    'user_id' => Auth::id(),
                ]);
                $hasClapped = true;
            }

            return response()->json([
                'clapsCount' => $post->claps()->count(),
                'hasClapped' => $hasClapped
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to process clap: ' . $e->getMessage()
            ], 500);
        }
    }

    public function clapget(UserPost $post)
    {
        try {
            $hasClapped = $post->claps()->where('user_id', Auth::id())->exists();
            
            return response()->json([
                'clapsCount' => $post->claps()->count(),
                'hasClapped' => $hasClapped
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to get clap status: ' . $e->getMessage()
            ], 500);
        }
    }
}
