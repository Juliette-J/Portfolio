<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Type;
use App\Models\LinkImageHashs;
use App\Http\Requests\ImageRequest;

class ImageController extends Controller
{
    public function create() {
        $types = Type::get();
        return view('add_image', ['types' => $types]);
    }

    public function store(ImageRequest $request) {
        $image = new Image();
        $image->title = $request->input('title');
        $image->path = $request->input('path');
        $image->date = $request->input('date');
        $image->desc = $request->input('desc');
        $image->desc_fr = $request->input('desc_fr');
        $image->id_type = $request->input('id_type');
        if($image->save()) {
            //return redirect()->route('images.create')->with('succes', 'Successfully stored !');
            return json_encode($image);
        }
        return 'Error...';
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
            return redirect()->route('images.list')->with('succes', 'Successfully deleted !');
        }
        return redirect()->route('images.list')->with('error', 'Error...');
    }
    
    /* Pas utilisée */
    public function show(Image $image) {
        return $image;
    }
}

