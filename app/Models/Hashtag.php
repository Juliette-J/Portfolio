<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;
    protected $table = "hashtags";
    protected $primarykey = "id";
    const IMAC = "IMAC";
    
    protected $fillable = ['label'];
}
