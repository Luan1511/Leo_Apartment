<?php

namespace App\Models;

<<<<<<< HEAD
=======
use App\Models\Admin\Laptop;
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
<<<<<<< HEAD
    // use HasFactory;
    protected $table = 'comments_post';
=======
    use HasFactory;
    protected $table = 'comments';
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
<<<<<<< HEAD
        'resident_id',
        'post_id',
        'content',
        'created_at',
        'updated_at',
        'parent_id',
    ];

    public function resident(){
        return $this->belongsTo(Resident::class);
    }

    public function post(){
        return $this->belongsTo(CommunityPost::class);
    }

    public function replies(){
        return $this->hasMany(Comment::class, 'parent_id', 'id');
=======
        'customer_id',
        'laptop_id',
        'content',
        'video',
        'image',
        'rating',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function laptop(){
        return $this->belongsTo(Laptop::class, 'laptop_id', 'id');
>>>>>>> ca283f8f4cde8eff392b4659c95fe6516e2afd10
    }
}
