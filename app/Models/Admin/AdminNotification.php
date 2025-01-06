<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    use HasFactory;
    protected $table = 'notification_admin';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'user_id', 
        'content',
        'type',
<<<<<<< HEAD
        'image',
=======
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
        'is_read',
        'created_at',
        'updated_at'
    ];
    public function sender()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    } 

    protected static function booted()
    {
        static::addGlobalScope('adminNotify', function ($query) { 
            // $query->where('is_read', 0);
        });
    }
}
