<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request, $lang){
		if(Auth::user()->currentWallet() == null){
            return redirect(route('show.currencies', app()->getLocale()));
        }
    	$posts = Post::orderBy('id', 'desc')->paginate('10');
    	return view('blog.index')
    	->with('posts', $posts);
    }

    public function singlePost(Request $request, $lang, $excerpt, $id){
		if(Auth::user()->currentWallet() == null){
            return redirect(route('show.currencies', app()->getLocale()));
        }
    	$post = Post::where('id', $id)->first();
		
    	return view('blog.post')
    	->with('post', $post);
    }
}
