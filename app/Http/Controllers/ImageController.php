<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Type;
use App\Http\Requests\ImageRequest;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function create() {
        $types = Type::get();
        return view('add_image', ['types' => $types]);
    }

    public function store(ImageRequest $request) {
        $images = new Image();
        $images->title = $request->input('title');
        $images->path = $request->input('path');
        $images->date = $request->input('date');
        $images->desc = $request->input('desc');
        $images->id_type = $request->input('id_type');
        if($images->save()) {
            //return view('home');
            return redirect()->route('home.admin')->with('succes', 'Success !');
        }
    }

    public function index() {
        $images = DB::table('images')->get();
        return view('index_images', ['images' => $images]);
    }

    public function edit($id) {
        $image_query = Image::select('images.*')->where('images.id', $id)->get();
        $image=$image_query[0];
        $types = Type::get();
        //dd($image);
        return view('edit_image', [
            'image' => $image,
            'types' => $types
        ]);
    }

    public function update(ImageRequest $request, Image $image) {
        if($image->fill($request->all())->save()) {
            return redirect()->route('images.update', ['id' => $image->id])->with('succes', 'Successfully updated !');
        }
        return redirect()->route('images.update', ['id' => $image->id])->with('error', 'Not updated !');
    }

    public function show(Image $image) {
        return $image;
    }

    public function destroy($id) {
        if(Image::where('images.id',$id)->delete()) {
            //return redirect()->route('home.admin')->with('succes', 'Success !');
            return view('home');
        }
    }
}

