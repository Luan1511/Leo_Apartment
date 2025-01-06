<?php

namespace App\Models\Admin;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    // use HasFactory;
    protected $table = 'admin';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'user_id',
        'created_at',
        'updated_at',
    ];

<<<<<<< HEAD
    public function user(){
=======
    public function user()
    {
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function message()
    {
        return $this->hasMany(Message::class, 'admin_id', 'id');
    }

<<<<<<< HEAD
=======
    
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
}
