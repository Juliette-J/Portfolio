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
        $image->path = "/storage/images/".$request->input('path');
        $image->date = $request->input('date');
        $image->desc = $request->input('desc');
        $image->desc_fr = $request->input('desc_fr');
        $image->id_type = $request->input('id_type');
        if($image->save()) {
            return json_encode($image);
        }
        return 'Error...';
    }

    public function index() {
        return Image::get();
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
            return json_encode($image);
        }
        return 'Not updated !';
    }

    public function destroy($id) {
        LinkImageHashs::where('image_hashs.id_image', $id)->delete();
        if(Image::find($id)->delete()) {
            return 'Successfully deleted !';
        }
        return 'Error...';
    }
    
    /* Not used */

    /* public function show(Image $image) {
        return $image;
    } */
}

