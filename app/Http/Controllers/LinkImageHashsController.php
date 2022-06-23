<?php

namespace App\Http\Controllers;


use App\Models\LinkImageHashs;
use App\Http\Requests\LinkImageHashsRequest;
use Illuminate\Support\Facades\DB;

class LinkImageHashsController extends Controller
{
    public function index() {
        $images = DB::table('images')->get();
        $hashtags = DB::table('hashtags')->get();
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
    }

    public function update(LinkImageHashsRequest $request, LinkImageHashs $link) {
        if($link->fill($request->all())->save()) {
            return view('home');
        }
    }

    public function show(LinkImageHashs $link) {
        return $link;
    }

    public function destroy(LinkImageHashs $link) {
        if($link->delete()) {
            return true;
        }
    }
}

