<?php

namespace App\Http\Controllers;
use App\Models\video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    function index(){
        return view('upload');
    }
    function fetch(){
      $data=video::all()->toArray();
      return view('videos',compact('data'));
    }

    function insert(Request $request)
    {
       $request->validate([
           'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm'
       ]);

       $file=$request->file('video');
       $file->move('upload',$file->getClientOriginalName());
       $file_name=$file->getClientOriginalName();

       $insert=new video();
       $insert->video = $file_name;
       $insert->save();

       return redirect('/fetch_video');
    }
}
