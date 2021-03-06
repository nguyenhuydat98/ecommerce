<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public $timestamps = true;

    public function productInformations()
    {
        return $this->hasMany(ProductInformation::class);
    }
}

