<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $product = Product::leftJoin('category', 'category.id', '=', 'product.category_id')
                ->select('product.*', 'category.name as category');
            return DataTables::of($product)

                ->make(true);
        }

        $data['title'] = 'Product';
        $data['category'] = Category::all();
        return view('admin.product.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'required|unique:product,sku,' . $request->id,
            'name' => 'required',
            'category' => 'required',
            'purchase_price' => 'required',
            'selling_price' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'category.required' => 'The category field is required.'
        ]);

        // check if $request->photo is not empty
        $photo = [];
        if ($request->hasFile('photo')) {
            $filePhoto = $request->file('photo');
            $photo = time() . '.' . $filePhoto->getClientOriginalExtension();

            $upload = Storage::disk('public')->putFileAs('product', $filePhoto, $photo);

            $photo = [
                'photo' => $photo
            ];
        }

        // delete Rp and . from $request->purchase_price and convert to integer
        $purchase_price = str_replace('.', '', $request->purchase_price);
        $purchase_price = str_replace('Rp ', '', $purchase_price);

        // delete Rp and . from $request->selling_price and convert to integer
        $selling_price = str_replace('.', '', $request->selling_price);
        $selling_price = str_replace('Rp ', '', $selling_price);

        $store = Product::updateOrCreate([
            'id' => $request->id
        ], array_merge([
            'sku' => $request->sku,
            'name' => $request->name,
            'purchase_price' => $purchase_price,
            'selling_price' => $selling_price,
            'category_id' => $request->category,
            'updated_at' => now()
        ], $photo));

        return response()->json([
            'status' => 'success',
            'message' => $request->id == null ? 'Product created successfully' : 'Product updated successfully',
            'data' => $store
        ]);
    }

    public function edit($id)
    {
        $findProduct = Product::find($id);

        return response()->json([
            'status' => 'success',
            'data' => $findProduct
        ]);
    }

    public function destroy($id)
    {
        $findProduct = Product::find($id);

        if ($findProduct) {
            $findProduct->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Product deleted successfully',
            ]);
        }
    }
}
