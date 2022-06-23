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
        $hashtags = DB::table('hashtags')->get();
        return view('add_hash', ['hashtags' => $hashtags]);
    }

    public function store(HashtagRequest $request) {
        $hashtags = new Hashtag();
        $hashtags->label = $request->input('label');
        if($hashtags->save()) {
            //return view('home');
            return redirect()->route('home.admin')->with('succes', 'Success !');
        }
    }

    public function index() {
        $hashtags = Hashtag::get(); //join('image_hashs', 'hashtags.id', 'image_hashs.id_hashtag')->join('images', 'image_hashs.id_image', 'images.id')->orderBy('hashtags.label')->get();
        $images = Image::join('image_hashs', 'images.id', 'image_hashs.id_image')->join('hashtags', 'image_hashs.id_hashtag', 'hashtags.id')->get();
        //dd($hashtags);
        return view('index_hashs', [
            'hashtags' => $hashtags,
            'images' => $images
        ]);
    }

    public function update(HashtagRequest $request, Hashtag $hashtags) {
        if($hashtags->fill($request->all())->save()) {
            return view('home');
        }
    }

    public function show(Hashtag $hash) {
        return $hash;
    }

    public function destroy($id) {
        LinkImageHashs::where('image_hashs.id_hashtag', $id)->delete();
        if(Hashtag::find($id)->delete()) {
            return redirect()->route('home.admin')->with('succes', 'Success !');
            //return view('home');
        }
    }
}

