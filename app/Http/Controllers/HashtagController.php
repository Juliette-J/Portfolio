<?php

namespace App\Http\Controllers;

use App\Models\Hashtag;
use App\Models\Image;
use App\Models\LinkImageHashs;
use App\Http\Requests\HashtagRequest;

class HashtagController extends Controller
{
    public function create() {
        $hashtags = Hashtag::get();
        return view('add_hash', ['hashtags' => $hashtags]);
    }

    public function store(HashtagRequest $request) {
        $hashtag = new Hashtag();
        $hashtag->label = $request->input('label');
        $hashtag->label_fr = $request->input('label_fr');
        if($hashtag->save()) {
            return json_encode($hashtag);
        }
        return 'Error...';
    }

    public function index() {
        $hashtags = Hashtag::get(); 
        $images = Image::join('image_hashs', 'images.id', 'image_hashs.id_image')->join('hashtags', 'image_hashs.id_hashtag', 'hashtags.id')->get();
        return array($hashtags,$images);
    }

    public function destroy($id) {
        LinkImageHashs::where('image_hashs.id_hashtag', $id)->delete();
        if(Hashtag::find($id)->delete()) {
            return 'Successfully deleted !';
        }
        return 'Error...';
    }

    /* Not used */

    /* 
    public function update(HashtagRequest $request, Hashtag $hashtags) {
        if($hashtags->fill($request->all())->save()) {
            return view('home');
        }
    }
    public function show(Hashtag $hash) {
        return $hash;
    }
    */

    
}

