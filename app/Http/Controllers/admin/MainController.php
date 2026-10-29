<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
        $stats = [
            'products_count'   => Product::count(),
            'categories_count' => Category::count(),
            'orders_count'     => Order::count(),
        ];

        return view('admin.index', compact('stats'));
    }
}