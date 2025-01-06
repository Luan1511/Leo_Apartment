<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $primaryKey = 'id';
    public $timestamps = true;
<<<<<<< HEAD
    protected $fillable = [
        'id',
        'type',
        'image',
        'created_at',
        'updated_at'
    ];
=======
    protected $fillable = ['id', 'type', 'image', 'created_at', 'updated_at'];
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
}
