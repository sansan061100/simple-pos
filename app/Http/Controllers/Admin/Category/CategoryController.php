<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $category = Category::query();
            return DataTables::of($category)
                ->make(true);
        }

        $data['title'] = 'Category';
        return view('admin.category.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $store = Category::updateOrCreate([
            'id' => $request->id
        ], $request->all());

        return response()->json([
            'status' => 'success',
            'message' => $request->id == null ? 'Category created successfully' : 'Category updated successfully',
            'data' => $store
        ]);
    }
}
