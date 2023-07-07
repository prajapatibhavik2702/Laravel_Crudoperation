<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index',['products'=> Product::get() ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        //validate

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        // dd($request->all());
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'),$imageName);

        $product = new Product;

        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Prodcut Created !!!');
    }

    public function edit($id)
    {
        // dd($id);
        $product = Product::where('id',$id)->first();

        return view('products.edit',['product'=>$product]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable'
        ]);
        $product = Product::where('id',$id)->first();

        if(isset($request->image))
        {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'),$imageName);
        $product->image = $imageName;
        }
        // dd($request->all());

        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Prodcut Update !!!');
    }

    public function delete($id)
    {
       $product = Product::where('id',$id)->first();
       $product->delete();
       return back()->withSuccess('Prodcut Deleted !!!');
    }
}
