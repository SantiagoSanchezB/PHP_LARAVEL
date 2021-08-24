<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
     // Listar Productos
     function show(){
        $CategList = Categories::all();
        // return dd($productList);
        return view('categories/list',['categList'=>$CategList]);
    }

    function delete($id){
        $categoria = Categories::findOrFail($id);
        $categoria -> delete();
        return redirect('/categories')->with('delete', 'Categoria Eliminada');
    }

    function form($id = null){
        if (!$id){
            $Categ = new Categories();
        }else{
            $Categ = Categories::findOrFail($id);
        }
        return view('categories/register',['cat' => $Categ]);
    }

    function register(Request $request){
        $cat = new Categories();

        if ($request->id > 0){
            $cat = Categories::findOrFail($request->id);
        }
        $request->validate([
            'Name' => 'required|max:50',
            'Description' => 'required|max:50'
        ]);
        $cat-> name = $request ->Name;
        $cat -> description = $request ->Description;
        $cat ->save();
        return redirect('/categories')->with('agregate', 'Categoria Agregada');
    }
}
