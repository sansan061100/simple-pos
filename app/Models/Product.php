<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $guarded = ['id'];

    public function scopeCategory($query)
    {
        return $query->leftJoin('category', 'category.id', '=', 'product.category_id')
            ->addSelect([
                'category.name as category'
            ]);
    }

    public function scopeStock($query)
    {
        return $query->leftJoin('stock', 'stock.product_id', '=', 'product.id')
            ->addSelect([
                DB::raw('SUM(IF(stock.status = 1, stock.qty,0)) - SUM(IF(stock.status = 0, stock.qty,0)) as stock')
            ]);
    }
}
