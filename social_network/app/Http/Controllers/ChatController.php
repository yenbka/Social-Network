<?php

namespace App\Http\Controllers;
use App\messages;
use App\User;
use App\Profile;
use Auth;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getOldMessage(Request $request){
        $yourMessages = messages::where('from', Auth::user()->id)->where('to',$request->toUserId)->get();
        $friendMessages = messages::where('from',$request->toUserId)->where('to',Auth::user()->id)->get();
        $yourProfile = Profile::whereId(Auth::user()->id)->first();
        $friendProfile = Profile::whereId($request->toUserId)->first();
        return response()->json([
            'yourMessages' => $yourMessages,
            'friendMessages' => $friendMessages,
            'yourProfile' => $yourProfile,
            'friendProfile' => $friendProfile
        ]);
    }

    public function index(){

    }
}
