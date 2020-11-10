<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'category_id',
        'name',
        'description',
        'type',
        'percent',
        'amount',
        'start_date',
        'end_date',
    ];

    public $timestamps = true;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
