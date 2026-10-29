<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'status'])
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $statuses   = Status::pluck('title', 'id')->all();

        return view('admin.products.create', compact('categories', 'statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'content'     => 'required',
            'category_id' => 'required|integer',
            'status_id'   => 'required|integer',
            'price'       => 'required|numeric|min:0',
            'old_price'   => 'nullable|numeric|min:0',
            'img'         => 'nullable|image',
        ]);

        $data = $request->all();

        if (empty($data['old_price'])) {
            $data['old_price'] = 0;
        }

        if ($request->hasFile('img')) {
            $folder = date('Y-m-d');
            $data['img'] = $request->file('img')->store("images/{$folder}", 'public');
        }

        $data['hit']  = $request->has('hit')  ? 1 : 0;
        $data['sale'] = $request->has('sale') ? 1 : 0;

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Товар добавлен');
    }

    public function edit($id)
    {
        $product    = Product::findOrFail($id);
        $categories = Category::pluck('title', 'id')->all();
        $statuses   = Status::pluck('title', 'id')->all();

        return view('admin.products.edit', compact('product', 'categories', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required',
            'content'     => 'required',
            'category_id' => 'required|integer',
            'status_id'   => 'required|integer',
            'price'       => 'required|numeric|min:0',
            'old_price'   => 'nullable|numeric|min:0',
            'img'         => 'nullable|image',
        ]);

        $product = Product::findOrFail($id);
        $data = $request->except(['_token', '_method', 'img']);

        if (empty($data['old_price'])) {
            $data['old_price'] = 0;
        }

        if ($request->hasFile('img')) {
            if ($product->img) {
                Storage::disk('public')->delete($product->img);
            }
            $folder = date('Y-m-d');
            $data['img'] = $request->file('img')->store("images/{$folder}", 'public');
        } else {
            unset($data['img']);
        }

        $data['hit']  = $request->has('hit')  ? 1 : 0;
        $data['sale'] = $request->has('sale') ? 1 : 0;

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->img) {
            Storage::disk('public')->delete($product->img);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Товар удалён');
    }
}
