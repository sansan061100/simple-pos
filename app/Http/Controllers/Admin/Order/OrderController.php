<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $data['title'] = 'Order';

        return view('admin.order.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Order';
        $data['category'] = Category::all();
        $data['customer'] = Customer::all();
        return view('admin.order.create', $data);
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
                    'description' => 'Order',
                    'status' => config('constants.stock.out'),
                ]);

                $detail[] = new OrderDetail([
                    'discount' => $item['discount'],
                    'stock_id' => $stock->id,
                ]);
            }

            $Order = Order::create([
                'customer_id' => $request->customer_id,
                'total' => $total,
                'status' => config('constants.Order.pending'),
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
