<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with('likes')->orderByDesc('id')->paginate(10);
        return view('post.news', compact('posts'));
    }

    public function addLike(Post $post)
    {
        if (!$post->likes->contains('user_id', Auth::id())){
            $post->likes()->create(['user_id' => auth()->user()->id]);
        }
        else {
            session()->flash('error', 'Вы уже лайкнули эту запись!');
        }

        return to_route('news.index');
    }
}
