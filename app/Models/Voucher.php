<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'formality',
        'value',
        'value_order',
        'start_date',
        'end_date',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
