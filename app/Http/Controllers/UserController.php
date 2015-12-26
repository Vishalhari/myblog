<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
    	$posts = Posts::where('active',1)->orderby('created_at','desc')->paginate(5);
    	$title = 'Latest Posts';
    	return view('home')->withPosts($posts)->withTitle($title);
    }

        public function create(Request $request)
    {
    // if user can post i.e. user is admin or author
    if($request->user()->can_post())
    {
    return view('posts.create');
    }
    else
    {
    return redirect('/')->withErrors('You have not sufficient permissions for writing post');
    }
    } 
}
