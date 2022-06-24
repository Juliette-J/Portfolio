<?php

namespace App\Http\Controllers;


use App\Models\LinkImageHashs;
use App\Http\Requests\LinkImageHashsRequest;
use App\Models\Hashtag;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class LinkImageHashsController extends Controller
{
    public function create() {
        $images = Image::get();
        $hashtags = Hashtag::get();
        return view('add_link', ['images' => $images, 'hashtags' => $hashtags]);
    }

    public function store(LinkImageHashsRequest $request) {
        $link = new LinkImageHashs();
        $link->id_image = $request->input('image_id');
        $link->id_hashtag = $request->input('hash_id');
        dd($link);
        if($link->save()) {
            //return view('home');
            return redirect()->route('home.admin')->with('succes', 'Success !');
        }
        return redirect()->route('home.admin')->with('error', 'Error...');
    }

    public function index() {
        $images = Image::get(); //join('image_hashs', 'hashtags.id', 'image_hashs.id_hashtag')->join('images', 'image_hashs.id_image', 'images.id')->orderBy('hashtags.label')->get();
        $links = LinkImageHashs::join('images', 'image_hashs.id_image', 'images.id')->join('hashtags', 'image_hashs.id_hashtag', 'hashtags.id')->select(['image_hashs.id', 'image_hashs.id_image', 'hashtags.label'])->get();
        return view('index_links', [
            'images' => $images,
            'links' => $links
            
        ]);
    }

    /*
    public function update(LinkImageHashsRequest $request, LinkImageHashs $link) {
        if($link->fill($request->all())->save()) {
            return view('home');
        }
    }
    */

    public function update(LinkImageHashsRequest $request, $id) {
        $link = LinkImageHashs::find($id);
        if($link->fill($request->all())->save()) {
            return redirect()->route('home.admin')->with('succes', 'Success !');
        }
        return redirect()->route('home.admin')->with('error', 'Error...');
    }

    public function show(LinkImageHashs $link) {
        return $link;
    }

    public function destroy($id) {
        if(LinkImageHashs::find($id)->delete()) {
            return redirect()->route('home.admin')->with('succes', 'Success !');
        }
    }
}

