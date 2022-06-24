<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Type;
use \App\Models\Hashtag;
use \App\Models\Image;
use \App\Models\LinkImageHashs;


class DatashowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Affichage liste images */

        // 1 - Selection de tous les champs de images
        $images = DB::table('images')->get();
        foreach ($images as $image) {
            echo "$image->path  ";
        }

        // 2 - Selection d'une partie des champs de images
        $images = DB::table('images')->select('path', 'date')->get();
        foreach ($images as $image) {
            echo "$image->path at $image->date / ";
        }

        /* Affichage d'une image (->value('path') pour un champ en particulier OU ->find(2) pour id=2) */
        $affichage_image = DB::table('images')->where('path', '/storage/images/Logo_ESIPE.png')->first();
        foreach($affichage_image as $champ) {
            echo "$champ  ";
        };

        /*Afficher une colonne */
        $paths = DB::table('images')->pluck('path');
        foreach ($paths as $path) {
            echo "$path  ";
        }

        /* Jointures */

        // Images/Types
        $images = DB::table('images')->join('types', 'images.id_type', 'types.id')->get();
        foreach ($images as $image) {
            $type = DB::table('types')->where('id', "$image->id_type")->first();
            echo "$type->name  ";
        }

        // Images/Image_Hashs/Hashtag
        $image_hashs = DB::table('image_hashs')->join('images', 'image_hashs.id_image', '=', 'images.id')
        ->join('hashtags', 'image_hashs.id_hashtag', '=', 'hashtags.id')->get();
        foreach ($image_hashs as $image_hash) {
            $image = DB::table('images')->where('id', "$image_hash->id_image")->first();
            echo "$image->path  ";
            $hash = DB::table('hashtags')->where('id', "$image_hash->id_hashtag")->first();
            echo "$hash->label  ";
        }
    }
}
