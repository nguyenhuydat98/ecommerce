<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_information_id',
        'color_id',
        'quantity',
        'unit_price',
        'rate',
        'sale_id',
    ];

    public $timestamps = true;

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function productInformation()
    {
        return $this->belongsTo(ProductInformation::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class)->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function orders()
    {
        return $this->belongsTomany(Order::class)->withTimestamps();
    }
}
