<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $data['customer'] = Customer::all();
        return view('admin.transaction.create', $data);
    }

    public function store(Request $request)
    {
        $total = 0;
        $stock = [];
        $detail = [];

        DB::beginTransaction();

        try {
            foreach ($request->cart as $item) {
                $stock = Stock::create([
                    'product_id' => $item['id'],
                    'qty' => $item['qty'],
                    'selling_price' => $item['price'],
                    'description' => 'Transaction',
                    'status' => config('constants.stock.out'),
                ]);

                $detail[] = new TransactionDetail([
                    'discount' => $item['discount'],
                    'stock_id' => $stock->id,
                ]);
            }

            $transaction = Transaction::create([
                'customer_id' => $request->customer_id,
                'total' => $total,
                'status' => config('constants.transaction.pending'),
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
