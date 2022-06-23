<?php

namespace App\Http\Controllers;


use App\Models\Hashtag;
use App\Http\Requests\HashtagRequest;
use Illuminate\Support\Facades\DB;

class HashtagController extends Controller
{
    public function index() {
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

    public function update(HashtagRequest $request, Hashtag $hashtags) {
        if($hashtags->fill($request->all())->save()) {
            return view('home');
        }
    }

    public function show(Hashtag $hash) {
        return $hash;
    }

    public function destroy(Hashtag $hash) {
        if($hash->delete()) {
            return true;
        }
    }
}

