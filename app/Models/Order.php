<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'phone',
        'sale_id',
        'total_payment',
        'status',
        'note',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productDetails()
    {
        return $this->belongsToMany(ProductDetail::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
