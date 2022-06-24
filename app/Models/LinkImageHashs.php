<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkImageHashs extends Model
{
    use HasFactory;
    protected $table = "image_hashs";
    protected $primarykey = "id";

    protected $fillable = ['id_image', 'id_hashtag'];
}
