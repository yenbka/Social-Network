<?php
//created by ngavuong
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Posts;
use App\Medias;
use App\User;
use App\messages;
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
            
            $files = $request->file('imagefile');
            foreach($files as $file){
                $media = new Medias;
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
        
        //$timeDistance = array();

        $medias = Medias::all();
        $posts = Posts::orderBy('id','desc')->get();
        
        //return view('newsfeed',['posts'=> $posts,'medias'=>$medias]);
        return redirect()->route('home',['id'=>$uid]);

    }

    public function index(){
        $uid = Auth::id();
        return redirect()->route('home',['id'=>$uid]);
    }

    public function getPost($post_id) {
        return Posts::find($post_id);
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
        foreach ($post->media as $media) {
            $media->delete();
        }
    }
    $post->delete();
    return redirect()->back();
    }

    public function getEditPost($pid){
    $listUser = User::with("profile")->where('id','!=',Auth::user()->id)->get();
    $listMess = messages::distinct()->with('profile')->with('user')->where('to',Auth::user()->id)->where('read_date',NULL)->get();
    $post = Posts::find($pid);
    return view('editpost',compact('post','listUser','listMess'));

    }

    public function editPost(Request $request,$pid){
    $listUser = User::with("profile")->where('id','!=',Auth::user()->id)->get();
    $listMess = messages::distinct()->with('profile')->with('user')->where('to',Auth::user()->id)->where('read_date',NULL)->get();
    $post = Posts::find($pid);
    $uid = Auth::id();

    if ($request->editContent==null) $post->content = "";
    else $post->content = $request->editContent;

    if($post->has_medias){
        if($request->hasFile('editImage')){
            $files = $request->file('editImage');
            foreach($files as $file){
                $media = new Medias;
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
        else{
            foreach ($post->media as $media) {
                $media->delete();

            }
            $post->has_medias=false;
        }
    }
    else{
        if($request->hasFile('editImage')){
            $post->has_medias = true;
            $files = $request->file('editImage');
            foreach($files as $file){
                $media = new Medias;
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
    }

    $post->save();

    return redirect()->route('home',['id'=>$uid]);

    }

    public static function getPostList($id) {
        if($id!=null)
            return Posts::where('user_id', $id)->orderBy('id','desc')->get();
        else
            return Posts::orderBy('id','desc')->get();
    }

}
