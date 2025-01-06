<?php

namespace App\Models\Admin;

use App\Models\RenTalPayment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentingApartment extends Model
{
    // use HasFactory;
    protected $table = 'rentings_apartment';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'apartment_id',
        'checkin_date',
        'checkout_date',
        'CCCD',
        'CCCD_image',
        'address',
        'phone',
        'email',
        'status',
        'created_at',
        'updated_at',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class, 'apartment_id', 'id');
    }

    public function payments()
    {
        return $this->hasMany(RenTalPayment::class, 'renting_id');
    }

    protected static function booted()
    {
        static::addGlobalScope('getRenting', function ($query) {
            // $query->where('is_read', 0);
        });
    }
}
