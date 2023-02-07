<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(){
        $viewData = [];
        $viewData["products"] = Product::all();
        $viewData["title"] = "shinjiku - Tienda";
        $viewData["subtitle"] = "Bienvenido a mi tienda";
        
        return view("products.index")->with("viewData", $viewData);
    }

    public function show($id){
        $viewData = [];
        $viewData["title"] = "shinjiku - Tienda";
        $viewData["subtitle"] = "Producto - {$id}";
        $viewData["products"] = Product::find($id);

        return view("products.show")->with("viewData", $viewData);
    }
}
