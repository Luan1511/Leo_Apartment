<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityPost extends Model
{
    // use HasFactory;
    protected $table = 'community_posts';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'resident_id',
        'title',
        'content',
        'image',
        'video',
        'created_at',
        'updated_at'
    ];

    public function resident(){
        return $this->belongsTo(Resident::class, 'resident_id', 'id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function comment_count(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
