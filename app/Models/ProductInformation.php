<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductInformation extends Model
{
    use SoftDeletes;

    protected $table = "product_informations";

    protected $fillable = [
        'category_id',
        'name',
        'brand',
        'description',
    ];

    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
