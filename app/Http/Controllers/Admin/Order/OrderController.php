<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
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
                $total += $item['price'] * $item['qty'];
                $stock = Stock::create([
                    'product_id' => $item['id'],
                    'qty' => $item['qty'],
                    'selling_price' => $item['price'],
                    'description' => 'Order',
                    'status' => config('constants.stock.out'),
                    'updated_at' => now(),
                ]);

                $detail[] = new OrderDetail([
                    'discount' => 0,
                    'stock_id' => $stock->id,
                ]);
            }
            $discount = $request->discount / 100 * $total;
            $total = $total - $discount;

            $order = Order::create([
                'invoice_code' => 'INV-' . date('YmdHis'),
                'customer_id' => $request->customer,
                'amount' => $total,
                'paid' => $request->paid,
                'change' => $request->paid - $total,
                'discount' => $discount,
                'status' => 1,
                'user_id' => auth()->user()->id,
                'updated_at' => now(),
            ]);
            $order->detail()->saveMany($detail);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Order created successfully',
                'redirect' => route('admin.order.index')
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
