<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;




class ProductController extends Controller
{
    
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255|unique:products,name',
            'brand'=>'required|string|max:255',
            'category'=>'required',
            'picture'=>'required',
            'price'=>'required',
            'description'=>'required'


        ]);
            $product = new Product();
            $product->name = $request['name'];
            $product->brand = $request['brand'];
            $product->category_id = $request['category'];
            $product->picture = $request['picture']->store('uploads/product','public');
            $product->price = $request['price'];
            $product->description = $request['description'];
            $product->status = true;
            $product->save();
            $productName = $request->input('name');
            return redirect()->route('product.index', ['category' => $request->get('category', '-1'), 'search' => $request->get('search', '')])
                     ->with('success', "{$productName} product of brand {$product->brand} in {$product->category->name} category added successfully!");
        }

    public function index(Request $request){
            $products = Product::query();

            if($request->has("category")){
                if($request->get('category') ==  '-1' ){
                    $products = $products->with(['category'])->get();
                }else{
                    $products = $products->where('category_id', $request->get('category'))->get();
                }
            }else{
                $products = $products->with(['category'])->get();
            }

            $categories = Category::where('status', 1)->get();
            $stocks = Stock::with(['product', 'product.category'])->get();
            $totalStocks = $stocks->groupBy('product_id')->map(function ($items) {
                return $items->sum('quantity');
            });
            return view('inventory.product', compact('products', 'categories', 'totalStocks'));
        }
    public function delete($id){
            $product=Product::find($id);
            $product->delete();
            return redirect()->route('product.index')->with('success', " {$product->name} product deleted successfully!");
    }

    // public function edit($id){
            //     $category = Category::find($id);
            //     if(is_null($category)){
            //         return redirect('category');
            //     }else{
            //         $data=compact('category');
            //         return view('category.edit')->with($data);
            //     }

    //         }
    // public function update(Request $request, $id)
    //         {
    //             $request->validate([
    //             'name'=>'required|string|max:255',
    //             'brand'=>'required|string|max:255',
    //             'category'=>'required',
    //             'picture'=>'',
    //             'stock'=>'required',
    //             'price'=>'required',
    //             'description'=>'required'
        
    //             ]);
    //             $product = Product::find($id);
    //             $product->name = $request['name'];
    //             $product->brand = $request['brand'];
    //             $product->category = $request['category'];
    //             $product->picture = $request['picture'];
    //             $product->stock = $request['stock'];
    //             $product->price = $request['price'];
    //             $product->description = $request['description'];
    //             $product->status = true;
    //             $product->save();
    //             return $this->index();
    //         }
    public function searchProducts(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $products = Product::where('name', 'LIKE', "%$search%")->orWhere('brand', 'LIKE', "%$search%")->orWhereHas('category', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");})->get();
        } else {
            $products = Product::all();
        }  
        return redirect()->route('product.index')->with('products', $products);
    }
    
    

}
