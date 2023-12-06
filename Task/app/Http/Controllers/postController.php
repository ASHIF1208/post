<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\comment;
use App\Models\User;
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
        $item->user_id = Auth::id();
        $file = $res->file('image');
        $filename = time().".".$file->getClientOriginalExtension();
        $item->image=$filename;
        $file->storeAs('file',$filename,'public');
        $item->save();
        return redirect('/showpost'); 

    }
    public function showpost(){
        $item = post::get();
        $command = comment::get();
        $user = User::get();
        return view('posts.showPosts',compact('item','command','user'));
    }

    public function postcommand(Request $comm,$id){
        $command = new comment();
        $command->command= $comm->command;
        $command->user_id = Auth::id();
        $command->post_id = $id;
        $command->save();
        return back();
    }
    public function findpost($id){
        $find =  post::get()->where("user_id","=",$id);
        return view('posts.userpost',compact('find'));
    }
}
