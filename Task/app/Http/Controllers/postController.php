<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\command;
use Illuminate\Support\Facades\Auth;

class postController extends Controller
{
    public function index(){
        return view("posts.createPost");
    }
    public function addpost(Request $res){
        $item = new post();
        $item->title = $res->title;
        $item->content = $res->content;
        $file = $res->file('image');
        $filename = time().".".$file->getClientOriginalExtension();
        $item->image=$filename;
        $file->storeAs('file',$filename,'public');
        $item->save();
        return redirect('/showpost'); 

    }
    public function showpost(){
        $item = post::get();
        $command = command::get();
        return view('posts.showPosts',compact('item','command'));
    }

    public function postcommand(Request $comm,$id){
        $command = new command();
        $command->command= $comm->command;
        $command->user_id = Auth::id();
        $command->post_id = $id;
        $command->save();
        return back();
    }
}
