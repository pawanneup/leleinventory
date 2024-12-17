<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255|unique:categories,name',
            'picture'=>'',
            'description'=>'required'

        ]);
        
            $category = new Category();
            $category->name = $request['name'];
            // $category->picture = $request['picture']->store('uploads/category');
            $category->picture = $request['picture']->store('uploads/category', 'public');
            $category->description = $request['description'];
            $category->save();
            return redirect()->route('store.category')->with('success', 'Category Added successfully!');

    }
    public function view(){
            $categories = Category::all();
            $data=compact('categories');
            return view('inventory.category')->with($data);
    }

    // public function edit($id){
    //     $category = Category::find($id);
    //     if(is_null($category)){
    //         return redirect('category');
    //     }else{
    //         $data=compact('category');
    //         return view('inventory.category-edit')->with($data);
    //     }

    //         }
    // public function update(Request $request, $id)
    //         {
    //             $request->validate([
    //                 'name'=>'required|string|max:255',
    //                 'picture'=>'',
    //                 'description'=>'required'
        
    //             ]);
    //             $category = Category::find($id);
    //             $category->name = $request['name'];
    //             $category->picture = $request['picture'];
    //             $category->description = $request['description'];
    //             $category->save();
    //             return $this->view();
    //         }
             
                


               
                
               
            

    public function delete($id){
                $category=Category::find($id);
                $category->delete();
                return redirect()->route('category')->with('success', 'Category deleted successfully!');
    }
}
