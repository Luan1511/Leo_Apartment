<?php

namespace App\Models;

use App\Models\Admin\RentingApartment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenTalPayment extends Model
{
    protected $table = 'rental_payments';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['renting_id', 'month'];

    public function renting()
    {
        return $this->belongsTo(RentingApartment::class);
    }
}
