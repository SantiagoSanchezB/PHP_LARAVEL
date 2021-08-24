<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Categories;
use GuzzleHttp\Psr7\Message;

class ProductController extends Controller
{
    // Listar Productos
    function show(){
        $brand = Product::has('brand')->get();
        // return dd($productList);
        return view('product/list',['productsList'=>$brand]);
    }

    function delete($id){
        $producto = Product :: findOrFail($id);
        $producto -> delete();
        return redirect('/products')->with('delete', 'Producto Eliminado');
    }

    function form($id = null){
        if (!$id){
            $product = new Product();
        }else{
            $product = Product::findOrFail($id);
        }

        $brands = Brand::all();
        $category = Categories::all();
        return view('product/register',['product' => $product, 'brands' => $brands, 'category' =>$category]);
    }

    function register(Request $request){
        $product = new Product();

        if ($request->id > 0){
            $product = Product::findOrFail($request->id);
        }
        $request->validate([
            'Name' => 'required|max:50',
            'Cost' => 'required',
            'Price' => 'required',
            'Quantity' => 'required|numeric',
            'Brand' => 'required',
            'Category' => 'required'
        ]);
        $product -> name = $request ->Name;
        $product -> cost = $request ->Cost;
        $product -> price = $request ->Price;
        $product -> quantity = $request ->Quantity;
        $product -> Brand_id = $request ->Brand;
        $product -> categories_id = $request ->Category;
        $product ->save();
        return redirect('/products')->with('agregate', 'Producto Agregado');
    }
}
