<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Type;
use \App\Models\Hashtag;
use \App\Models\Image;
use \App\Models\LinkImageHashs;


class DatatestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $type1 = Type::create([
            'slug' => 'dessin',
            'name' => 'Dessin'
        ]);

        $type2 = Type::create([
            'slug' => 'photo',
            'name' => 'Photo'
        ]);
        
        $hashtag = Hashtag::create([
            'label' => 'IMAC'
        ]);*/

        $image1 = Image::create([
            'title' => 'Logo ESIPE',
            'path' => '/storage/images/Logo_ESIPE2.png',
            'id_type' => 7,
            'date' => '31/01/2013',
            'desc' => "Logo de l'ESIPE"
        ]);

        $image2 = Image::create([
            'title' => 'Logo IMAC',
            'path' => '/storage/images/imac-edition2.png',
            'id_type' => 8,
            'date' => '31/01/2013',
            'desc' => "Logo de l'IMAC"
        ]);

        $link1 = LinkImageHashs::create([
            'id_image' => $image1->id,
            'id_hashtag' => 1
        ]);

        $link2 = LinkImageHashs::create([
            'id_image' => $image2->id,
            'id_hashtag' => 1
        ]);

        $image3 = Image::create([
            'title' => 'Logo ESIPE',
            'path' => '/storage/images/Logo_ESIPE3.png',
            'id_type' => 7,
            'date' => '31/01/2013',
            'desc' => "Logo de l'ESIPE"
        ]);

        $image4 = Image::create([
            'title' => 'Logo IMAC',
            'path' => '/storage/images/imac-edition3.png',
            'id_type' => 8,
            'date' => '31/01/2013',
            'desc' => "Logo de l'IMAC"
        ]);

        $link3 = LinkImageHashs::create([
            'id_image' => $image3->id,
            'id_hashtag' => 1
        ]);

        $link4 = LinkImageHashs::create([
            'id_image' => $image4->id,
            'id_hashtag' => 1
        ]);


    }
}
