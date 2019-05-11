<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use Auth;
use App\Posts;
use Carbon\Carbon;
class CommentController extends Controller
{
    public function addComment(Request $request, $pid)
    {
    	$request->validate([
            'content'=>'required',
        ]);
        
        $uid = Auth::id();
   		$comment = new Comments;
        $comment->content = $request['content'];
        $comment->user_id = $uid;
        $comment->post_id = $pid;
    
        $comment->save();

        $date_comment = $comment->created_at;
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $result = $date_comment->diffForHumans($now);

        $user = Auth::user();
        $avatar = $user->profile->avatar_path;
        $name = $user->last_name . " " . $user->first_name;

        $numb = Posts::find($pid)->comment->count();

        $data =['content'=>$comment->content,'avatar'=>$avatar,'time'=>$result,'name'=>$name, 'numb'=>$numb];
        
        return $data;
    }
}
