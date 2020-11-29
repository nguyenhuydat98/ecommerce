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

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('admin_id', 'quantity', 'import_price')
            ->withTimestamps();
    }
}
