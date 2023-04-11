<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('admin.dashboard.index', $data);
    }

    public function filter(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'widget' => $this->widget($request),
                'topSellProduct' => $this->topSellProduct($request),
                'chartOrder' => $this->chartOrder($request),
            ]);
        }
    }

    public function widget($request)
    {
        $widget = [
            [
                'title' => 'Total User',
                'value' => 0,
                'icon' => 'fas fa-users',
                'color' => 'bg-primary',
                'size' => 'col-md-2',
            ],
            [
                'title' => 'Total Product',
                'value' => 0,
                'icon' => 'fas fa-boxes',
                'color' => 'bg-green',
                'size' => 'col-md-2',
            ],
            [
                'title' => 'Total Customer',
                'value' => 0,
                'icon' => 'fas fa-users',
                'color' => 'bg-yellow',
                'size' => 'col-md-3',
            ],
            [
                'title' => 'Total Order',
                'value' => 0,
                'icon' => 'fas fa-shopping-cart',
                'color' => 'bg-red',
                'size' => 'col-md-2',
            ],
            [
                'title' => 'Total Sales',
                'value' => 0,
                'icon' => 'fas fa-money-bill-wave',
                'color' => 'bg-purple',
                'size' => 'col-md-3',
            ],
        ];

        $widget[0]['value'] = User::count();

        $widget[1]['value'] = Product::monthAndYear($request)->count();

        $widget[2]['value'] = Customer::monthAndYear($request)->count();

        $widget[3]['value'] = Order::monthAndYear($request)->count();

        $widget[4]['value'] = Order::monthAndYear($request)->sum('amount');

        return $widget;
    }

    public function topSellProduct($request)
    {
        $topSellProduct = [
            'labels' => [],
            'data' => [],
        ];

        $sellProduct = Product::leftJoin('stock', 'stock.product_id', '=', 'product.id')
            ->leftJoin('order_detail', 'order_detail.stock_id', '=', 'stock.id')
            ->leftJoin('order', 'order.id', '=', 'order_detail.order_id')
            ->selectRaw('product.name, sum(stock.qty) as qty')
            ->where([
                'order.status' => config('constants.order.success'),
                'stock.status' => config('constants.stock.out'),
            ])
            ->when($request->month, function ($query) use ($request) {
                return $query->whereMonth('order.created_at', $request->month);
            })
            ->when($request->year, function ($query) use ($request) {
                return $query->whereYear('order.created_at', $request->year);
            })
            ->groupBy('product.name')
            ->orderBy('qty', 'desc')
            ->limit(10)
            ->get();

        foreach ($sellProduct as $key => $value) {
            $topSellProduct['labels'][] = $value->name;
            $topSellProduct['data'][] = $value->qty;
        }

        return $topSellProduct;
    }

    public function chartOrder($request)
    {
        $chartOrder = [
            'labels' => [],
            'datasets' => []
        ];

        $month = $request->month;
        $year = $request->year;

        if ($month == null && $year == null) {
        } else {
            if ($month == null) {
                $order = Order::selectRaw('SUM(amount) as amount, COUNT(order.id) as count, MONTH(order.created_at) as month, user.name as user')
                    ->leftJoin('user', 'user.id', '=', 'order.user_id')
                    ->whereYear('order.created_at', $year)
                    ->groupBy(['month', 'user_id'])
                    ->get();

                $chartOrder['labels'] = collect(allMonths())->values();

                $no = 0;
                $chartOrder['datasets'] = $order->groupBy('user')->map(function ($item, $key) use (&$no) {
                    $allMonths = allMonths();
                    $data = [];

                    foreach ($allMonths as $value) {
                        $data[] = 0;
                    }

                    foreach ($item as $value) {
                        $data[$value->month - 1] = $value->amount;
                    }


                    $no++;

                    return [
                        'label' => $key,
                        'data' => $data,
                        'backgroundColor' => listColor()[$no],
                        'borderColor' => listColor()[$no],
                    ];
                })->values();

                return $chartOrder;
            }
        }
    }
}
