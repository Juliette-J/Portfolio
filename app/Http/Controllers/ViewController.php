<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\LinkImageHashs;
use Illuminate\Http\Request;

class ViewController extends Controller
{   
    public function index(Request $request) {
        $image_hashs_query = LinkImageHashs::query();
        $image_query = Image::query();

        if($request->has('hashtag')) {
            $image_hashs_query->join('images', 'image_hashs.id_image', 'images.id')->join('hashtags', 'image_hashs.id_hashtag', 'hashtags.id')->select('images.*');
            $image_hashs_query->where('hashtags.label', $request->get('hashtag')); 
            if($request->has('type')) {
                $image_hashs_query->join('types', 'images.id_type', 'types.id')->select('images.*')->where('types.slug', $request->get('type'));
            }
            return $image_hashs_query->get();
        }

        if($request->has('type')) {
            $image_query->join('types', 'images.id_type', 'types.id')
            ->where('types.slug', $request->get('type'))->select('images.*');
        }
        return $image_query->get();
    }
}
