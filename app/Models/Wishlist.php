<?php

namespace App\Models;

use App\Models\Admin\Apartment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlist'; 
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'user_id',
        'apartment_id',
    ];

    public function customer(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function apartment(){
        return $this->belongsTo(Apartment::class, 'apartment_id', 'id');
    }
}
