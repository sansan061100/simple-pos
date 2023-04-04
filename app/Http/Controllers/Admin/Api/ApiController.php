<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function product(Request $request)
    {
        $product = Product::where('name', 'like', '%' . $request->q . '%')
            ->orWhere('sku', 'like', '%' . $request->q . '%')
            ->limit(20)
            ->get();

        return response()->json($product);
    }
}
