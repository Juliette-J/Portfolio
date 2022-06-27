<?php

namespace App\Http\Controllers;

use App\Models\LinkImageHashs;
use App\Models\Image;
use App\Models\Hashtag;
use App\Http\Requests\LinkImageHashsRequest;

class LinkImageHashsController extends Controller
{
    public function create() {
        $images = Image::get();
        $hashtags = Hashtag::get();
        return view('add_link', ['images' => $images, 'hashtags' => $hashtags]);
    }

    public function store(LinkImageHashsRequest $request) {
        $link = new LinkImageHashs();
        $link->id_image = $request->input('id_image');
        $link->id_hashtag = $request->input('id_hashtag');
        //dd($link);
        if($link->save()) {
            return redirect()->route('home.admin')->with('succes', 'Successfully stored !');
        }
        return redirect()->route('home.admin')->with('error', 'Error...');
    }

    public function index() {
        $images = Image::get(); 
        $links = LinkImageHashs::join('images', 'image_hashs.id_image', 'images.id')->join('hashtags', 'image_hashs.id_hashtag', 'hashtags.id')->select(['image_hashs.id', 'image_hashs.id_image', 'hashtags.label'])->get();
        return view('index_links', [
            'images' => $images,
            'links' => $links
        ]);
    }

    public function update(LinkImageHashsRequest $request, $id) {
        $link = LinkImageHashs::find($id);
        if($link->fill($request->all())->save()) {
            return redirect()->route('home.admin')->with('succes', 'Successfully updated !');
        }
        return redirect()->route('home.admin')->with('error', 'Error...');
    }

    public function destroy($id) {
        if(LinkImageHashs::find($id)->delete()) {
            return redirect()->route('home.admin')->with('succes', 'Successfully deleted !');
        }
        return redirect()->route('home.admin')->with('error', 'Error...');
    }
    
    /* Pas utilisée */
    public function show(LinkImageHashs $link) {
        return $link;
    }
}

