<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = "types";
    protected $primarykey = "id";
    const DESSIN = "dessin";
    const PHOTO = "photo";

    protected $fillable = ['name'];
}
