<?php

namespace App\Http\Controllers;


use App\Models\Hashtag;
use App\Http\Requests\HashtagRequest;
use App\Models\Image;
use App\Models\LinkImageHashs;
use Illuminate\Support\Facades\DB;

class HashtagController extends Controller
{
    public function create() {
        $hashtags = Hashtag::get();
        return view('add_hash', ['hashtags' => $hashtags]);
    }

    public function store(HashtagRequest $request) {
        $hashtags = new Hashtag();
        $hashtags->label = $request->input('label');
        if($hashtags->save()) {
            return redirect()->route('home.admin')->with('succes', 'Successfully stored !');
        }
        return redirect()->route('home.admin')->with('error', 'Error...');
    }

    public function index() {
        $hashtags = Hashtag::get(); 
        $images = Image::join('image_hashs', 'images.id', 'image_hashs.id_image')->join('hashtags', 'image_hashs.id_hashtag', 'hashtags.id')->get();
        return view('index_hashs', [
            'hashtags' => $hashtags,
            'images' => $images
        ]);
    }

    public function destroy($id) {
        LinkImageHashs::where('image_hashs.id_hashtag', $id)->delete();
        if(Hashtag::find($id)->delete()) {
            return redirect()->route('home.admin')->with('succes', 'Successfully deleted !');
        }
        return redirect()->route('home.admin')->with('error', 'Error...');
    }

    /* Pas utilisées */
    public function update(HashtagRequest $request, Hashtag $hashtags) {
        if($hashtags->fill($request->all())->save()) {
            return view('home');
        }
    }

    public function show(Hashtag $hash) {
        return $hash;
    }

    
}

