<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Type;
use App\Http\Requests\ImageRequest;
use App\Models\LinkImageHashs;
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
            return redirect()->route('home.admin')->with('succes', 'Successfully stored !');
        }
        return redirect()->route('home.admin')->with('error', 'Error...');
    }

    public function index() {
        $images = Image::get();
        return view('index_images', ['images' => $images]);
    }

    public function edit($id) {
        $image = Image::find($id);
        $types = Type::get();
        return view('edit_image', [
            'image' => $image,
            'types' => $types
        ]);
    }

    public function update(ImageRequest $request, $id) {
        $image = Image::find($id);
        if($image->fill($request->all())->save()) {
            return redirect()->route('images.edit', ['id' => $image->id])->with('succes', 'Successfully updated !');
        }
        return redirect()->route('images.edit', ['id' => $image->id])->with('error', 'Not updated !');
    }

    public function destroy($id) {
        LinkImageHashs::where('image_hashs.id_image', $id)->delete();
        if(Image::find($id)->delete()) {
            return redirect()->route('home.admin')->with('succes', 'Successfully deleted !');
        }
        return redirect()->route('home.admin')->with('error', 'Error...');
    }
    
    /* Pas utilisée */
    public function show(Image $image) {
        return $image;
    }
}

