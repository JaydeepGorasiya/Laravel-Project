<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\media;

class MediaController extends Controller
{
    function index()
    {
        return view('media_view');
    }
    
    function upload(request $req)
    {
        $mediafile = $req->file('media');
        $name = $mediafile->getClientOriginalName();
        $ext = $mediafile->getClientOriginalExtension();
        $month = date('m');
        $year = date('Y');
        $path = "uploads/".$year."/".$month;
        
        $mediadatas = media::where('path',$path)->get();
        
        foreach($mediadatas as $mediadata)
        {
            $medianame = $mediadata->name;
            if($name == $medianame)
            {
                $i = 1;
                $mediafiledotsplit = explode(".",$name,2);
                if(strrpos($mediafiledotsplit[0],"-") !== false)
                {
                    $mediafiledashsplit = substr(strrchr($mediafiledotsplit[0],"-"),1);
                    if($mediafiledashsplit == $i)
                    {
                        $i++;
                        
                    }
                }
                else
                {
                    $name = $mediafiledotsplit[0]."-".$i.".".$mediafiledotsplit[1];
                }
            }
        } 
        
        $media = new media;
        $media->name = $name;
        $media->path = $path;
        $media->extension = $ext;
        $media->save();
        
        $mediafile->storeas($path,$name);
        // return back();   
    }
}
