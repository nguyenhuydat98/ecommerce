<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'image_link',
    ];

    public $timestamps = true;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
