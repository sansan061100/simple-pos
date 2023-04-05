<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Http\Controllers\Controller;
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
    }
}
