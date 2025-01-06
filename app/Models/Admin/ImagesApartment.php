<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesApartment extends Model
{
    // use HasFactory;
    protected $table = 'imagesapartment';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'image',
        'apartment_id',
    ];

    public function imagesApartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
