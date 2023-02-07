<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

//Para poder traer los productos de la base de datos y usar el Product
use App\Models\Product;


class AdminProductController extends Controller
{
    public function index() {
        $viewData = [];
        $viewData["title"] = "Admin Page - shinjiku";
        $viewData["products"] = Product::all();
        return view('admin.products.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
        ]);

        $lastID = DB::select("SHOW TABLE STATUS LIKE 'products'")[0]->Auto_increment;
        $extension = $request->file('image')->extension();
        Storage::disk('public')->put(
            $lastID.".".$extension,
            file_get_contents($request->file('image')->getRealPath())
        );

        $product = new Product;
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->image = $lastID.".".$extension;
        $product->save();

        return redirect()->route('admin.products.index');
    }

    public function delete($id){
        Storage::disk('public')->delete(Product::find($id)->image);
        $item = Product::find($id);
        $item->delete();

        return redirect()->route('admin.products.index');
    }

    public function edit($id) {
        $viewData = [];
        $viewData["title"] = "Panel de control - shinjiku";
        $viewData["product"] = Product::find($id);
        return view('admin.products.edit')->with("viewData", $viewData);
    }
    
    public function update($id, Request $request) {
        $item = Product::find($id);
        $item->update($request->all());
        
        if($request -> hasFile("image")){
            Storage::disk('public')->delete(Product::find($id)->image);
            $imageName =  $item -> id .'.'. $request->image->extension();
            $item -> setImage($imageName);
            Storage::disk('public')->put(  
                $imageName,  
                file_get_contents($request->file('image')->getRealPath())  
            );
        }

        $item->save();
        
        return redirect()->route('admin.products.index');
    }
    

}
