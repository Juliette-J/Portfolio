<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\LinkImageHashs;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function portfolio(Request $request, string $type = null) {
        $images_query = Image::query();
        $image_hashs_query = LinkImageHashs::query();
        $hashtags = $request->get('hashtags');
        
        if($type) {
            $images_query->join('types', 'images.id_type', 'types.id')->select('images.*')->where('types.slug',$type);
        }

        if($hashtags) {
            $image_hashs_query = LinkImageHashs::query();
            if($hashtags) {
                $image_hashs_query->join('images', 'image_hashs.id_image', 'images.id')->join('hashtags', 'image_hashs.id_hashtag', 'hashtags.id')->select('images.*');
                foreach($hashtags as $hashtag) {
                    $image_hashs_query->where('hashtags.label', $hashtag);
                }
            }
            if($type) {
                $image_hashs_query->join('types', 'images.id_type', 'types.id')->select('images.*')->where('types.slug',$type);
            }

            return view('portfolio_bis', [
                'images' => $image_hashs_query->get()
            ]);
        }

        return view('portfolio_bis', [
            'images' => $images_query->get()
        ]);
    }
}
