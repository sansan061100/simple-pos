<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $data['title'] = 'Transaction';

        return view('admin.transaction.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Transaction';
        $data['category'] = Category::all();
        $data['product'] = Product::all();
        return view('admin.transaction.create', $data);
    }
}
