<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'phone',
    ];

    public $timestamps = true;

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }
}