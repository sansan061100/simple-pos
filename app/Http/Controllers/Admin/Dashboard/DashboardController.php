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
            $month = $request->month;
            $year = $request->year;

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

            $widget[1]['value'] = Product::when($month, function ($query) use ($month) {
                return $query->whereMonth('created_at', $month);
            })->when($year, function ($query) use ($year) {
                return $query->whereYear('created_at', $year);
            })->count();

            $widget[2]['value'] = Customer::when($month, function ($query) use ($month) {
                return $query->whereMonth('created_at', $month);
            })->when($year, function ($query) use ($year) {
                return $query->whereYear('created_at', $year);
            })->count();

            $widget[3]['value'] = Order::when($month, function ($query) use ($month) {
                return $query->whereMonth('created_at', $month);
            })->when($year, function ($query) use ($year) {
                return $query->whereYear('created_at', $year);
            })->count();

            $widget[4]['value'] = Order::when($month, function ($query) use ($month) {
                return $query->whereMonth('created_at', $month);
            })->when($year, function ($query) use ($year) {
                return $query->whereYear('created_at', $year);
            })->sum('amount');





            return response()->json([
                'widget' => $widget,
            ]);
        }
    }
}
