<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id', "bevezeto"];

    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
