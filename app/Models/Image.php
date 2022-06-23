<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;
    protected $table = "images";
    protected $primarykey = "id";

    protected $fillable = ['title','path', 'date', 'desc', 'id_type'];
    //$images = Image::simplePaginate(18);  ???

    public $with = ['type'];


    /*************************************************************************
	**************************** RELATIONS ***********************************
	*************************************************************************/
    /**
     * Retourne le type de l'image
     * @return BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(Type::class, 'id_type');
    }
 }
