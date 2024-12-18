<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Request $request)
    {   
        // $stocks = Stock::with(['category', 'product'])->get();
        $products = Product::all();
        $stocks = Stock::with(['product', 'product.category'])->get();
        $categories = Category::where('status', 1)->get(); 
        return view('inventory.stock', compact('stocks', 'products', 'categories'));
    }

    public function store(Request $request)
    {
 
        $request->validate([
             
            'product_id' => '',  
            'quantity' => 'required|integer|min:1|max:500', 
            'supplier' => 'required|string|max:255',
            'date_of_addition' => 'required|date',   
        ]);

            $stock = new Stock();
            $stock->product_id = $request->input('product_id'); 
            $stock->quantity = $request->input('quantity');
            $stock->supplier = $request->input('supplier');
            $stock->date_of_addition = $request->input('date_of_addition');  
            $stock->save();
            return redirect()->route('stock')->with('success', "{$stock->quantity} stocks of {$stock->product->name} added successfully from Supplier {$stock->supplier}!");
    }
    
    public function delete($id){
            $stock=Stock::find($id);
            $stock->delete();
            return redirect()->route('stock')->with('success', "{$stock->quantity} stocks of {$stock->product->name} deleted successfully!");
    }

}
