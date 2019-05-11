<?php
use App\shift_master_models;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Auth;
use App\User;
use App\Posts;
use App\Likes;

class LikeController extends Controller
{

    public function likePost($pid){

    		
            $user_id = Auth::id();
            $index = 0;
            $likes = Likes::where('post_id', $pid)->get();
            $avatar = "";
            foreach($likes as $like){
                if($like->user_id==$user_id){
                    $index = 1; 
                    $like->delete();
                    break; 
                }
            }

            if($index == 0){
                $like = new Likes;
                $like->post_id = $pid;
                
                $like->user_id = $user_id;
                $like->save();
                $avatar = Auth::user()->profile->avatar_path;
            }

            $numb = Posts::find($pid)->likes->count();
            $data =['numb'=>$numb, 'index'=>$index, 'avatar'=>$avatar, 'uid'=>$user_id];

            return response()->json($data);
            
     }
}
