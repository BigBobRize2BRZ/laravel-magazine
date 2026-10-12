<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'Home page';

        $products = Product::query()
            ->with(['category', 'status'])
            ->orderBy('id', 'desc')
            ->paginate(10);

        // foreach ($products as $product) {
        //     echo "<p>{$product->title} | {$product->category->title} | {$product->status->title}</p>";
        // }

        return view('products.index', compact('title', 'products'));
    }

    public function show($slug)
    {
        dd($slug);
    }
}
