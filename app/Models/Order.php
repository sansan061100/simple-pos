<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $guarded = ['id'];

    function detail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
