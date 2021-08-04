<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostModel;

class PostContoller extends Controller
{
	public function post(Request $request){
    $post=new PostModel();
    	$post->subject=$request->input('subject');
    	$post->message=$request->input('message');
    	$post->save();
    	return view('admin.message');
	}

}
