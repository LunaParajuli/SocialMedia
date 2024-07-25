<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'location',
        'image_path',
        'caption',
    ];

    
    public function comments()
{
    return $this->hasMany(Comment::class);
}


}
