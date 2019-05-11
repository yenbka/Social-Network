<?php
//created by ngavuong
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Posts;
use App\Medias;
use Carbon\Carbon;

class PostController extends Controller
{
    public function addPost(Request $request){

        $uid = Auth::id();
        $post = new Posts;

        if ($request->text==null) $post->content = "";
        else $post->content = $request->text;
        
        $post->user_id = $uid; 

        if($request->hasFile('imagefile')){

            $post->has_medias = true;                       
        }
        else{
            $post->has_medias = false;
        }

        $post->save();

        if($post->has_medias){
            $media = new Medias;
            $file = $request->file('imagefile');
            $name = $file->getClientOriginalName();
            $extend = strtolower($file->getClientOriginalExtension());

            if($extend!='jpg' && $extend!='jpeg' && $extend!='png'){
                $media->type = 2;
            }
            else $media->type = 1;

            $hinh = str_random(4)."_".$name;
            while(file_exists("uploads/".$hinh)){
                $hinh = str_random(4)."_".$name;                
            }
            $file->move("uploads",$hinh); 
            $media->link = $hinh;          
            $media->user_id = $uid;
            $media->post_id = $post->id;

            $media->save();
        }
        
        $timeDistance = array();

        $medias = Medias::all();
        $posts = Posts::orderBy('id','desc')->get();
        
        //return view('newsfeed',['posts'=> $posts,'medias'=>$medias]);
        return redirect()->route('home',['id'=>$uid]);

    }


     public function getPost(){
        $uid = Auth::id();
        $medias = Medias::all();
        $posts = Posts::orderBy('id','desc')->get();

        //return view('newsfeed',['posts'=> $posts,'medias'=>$medias]);
        return redirect()->route('home',['id'=>$uid]);
     }

     public function deletePost($pid){
        $post = Posts::find($pid);

        if(!empty($post->likes)){
            foreach ($post->likes as $like) {
                $like->delete();
            }
        }
        if(!empty($post->comment)){
            foreach ($post->comment as $comment) {
                $comment->delete();
            }
        }
        if($post->has_medias){
            $post->media->delete();
            $post->delete();
        } 
        else
            $post->delete();


        return redirect()->back();
        
     }

      public function getEditPost($pid){
        $post = Posts::find($pid);
        return view('editpost',['post'=>$post]);
        
     }

     public function editPost(Request $request,$pid){
        $post = Posts::find($pid);
        $uid = Auth::id();

        if ($request->editContent==null) $post->content = "";
        else $post->content = $request->editContent;

        if($post->has_medias){
            if($request->hasFile('editImage')){
                $file = $request->file('editImage');
                $name = $file->getClientOriginalName();
                $extend = strtolower($file->getClientOriginalExtension());
                if($extend!='jpg' && $extend!='jpeg' && $extend!='png'){
                    $post->media->type = 2;
                }
                else $post->media->type = 1;

                $hinh = str_random(4)."_".$name;
                while(file_exists("uploads/".$hinh)){
                    $hinh = str_random(4)."_".$name;                
                }
                $file->move("uploads",$hinh); 
                $post->media->link = $hinh;     
                $post->media->save();  
            }
            else{
                $post->media->delete();
                $post->has_medias=false;
            }
        }
        else{
            if($request->hasFile('editImage')){
                $post->has_medias = true;  
                $media = new Medias;
                $file = $request->file('editImage');
                $name = $file->getClientOriginalName();
                $extend = strtolower($file->getClientOriginalExtension());

                if($extend!='jpg' && $extend!='jpeg' && $extend!='png'){
                    $media->type = 2;
                }
                else $media->type = 1;

                $hinh = str_random(4)."_".$name;
                while(file_exists("uploads/".$hinh)){
                    $hinh = str_random(4)."_".$name;                
                }
                $file->move("uploads",$hinh); 
                $media->link = $hinh;          
                $media->user_id = $uid;
                $media->post_id = $post->id;

                $media->save();
            }

        }
        $post->save();

        return redirect()->route('home',['id'=>$uid]);
        
     }

     

}
