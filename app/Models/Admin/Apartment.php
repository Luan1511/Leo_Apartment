<?php

namespace App\Models\Admin;

use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    // use HasFactory;
    protected $table = 'apartment';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'type',
        'status',
        'floor',
        'area',
        'price_per_month',
        'price_sale',
        'apartment_number',
        'bed',
        'bath',
        'image',
        'description',
        'created_at',
        'updated_at',
    ];

    // public function bookings()
    // {
    //     return $this->hasMany(BookingApartment::class);
    // }

    // public function residents()
    // {
    //     return $this->hasMany(Resident::class);
    // }

    // public function renters()
    // {
    //     return $this->hasMany(Renter::class);
    // }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ImagesApartment::class);
    }

    public function comment()
    {
        return $this->hasMany(CommentApartment::class);
    }    
}
