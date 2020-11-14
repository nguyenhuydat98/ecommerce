<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'brand',
        'description',
    ];

    public $timestamps = true;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
