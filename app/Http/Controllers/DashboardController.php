<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $products = Product::all();
        $stocks = Stock::with(['product', 'product.category'])->get();
        $totalStocks = $stocks->groupBy('product_id')->map(function ($items) {
            return $items->sum('quantity');
        });
        $categories = Category::where('status', 1)->get();
        return view('dashboard', compact('stocks', 'products', 'categories', 'totalStocks'));
    }
    
    
}
