<?php

namespace App\Models;

use App\Models\Admin\Apartment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    // use HasFactory;
    protected $table = 'resident';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'CCCD',
        'user_id',
        'apartment_id',
        'rented_at',
        'bought_at',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function apartment()
    {
        return $this->hasMany(Apartment::class, 'id', 'id');
    }

    protected static function booted()
    {
        static::addGlobalScope('getResident', function ($query) {
            // $query->where('is_read', 0);
        });
    }
}
