<?php

namespace App\Http\Controllers;

use Image;
use Throwable;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class TweetController extends Controller
{
    public function create(Request $request)
    {;
        $request->validate([
            'content' => 'required|max:250',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->avatar != null) {
            $image = $request->file('avatar');
        $input['imagename'] = time().'.'.$image->extension();
     
        $destinationPath = public_path('/images');
        $img = Image::make($image->path());
        $img->resize(intval(1200), 600, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        
        }else{
            $input['imagename'] = null;
        }
        


        // Insert SQL request
        Tweet::create([
            'content' => $request->content,
            'img' => $input['imagename'],
            'user_id' => Auth::id(),
        ]);

        return Redirect::route('dashboard');
    }
}
