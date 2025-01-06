<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyingApartment extends Model
{
    // use HasFactory;
    protected $table = 'buyings_apartment'; 
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'apartment_id',
        'CCCD',
        'CCCD_image',
        'address',
        'phone',
        'email',
        'status',
        'approved_atuy',
        'created_at',
        'updated_at',
    ];

    public function customer(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function apartment(){
        return $this->belongsTo(Apartment::class, 'apartment_id', 'id');
    }
}
