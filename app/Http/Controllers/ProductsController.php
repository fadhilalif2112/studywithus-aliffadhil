<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function products(Request $request){
        $data = Products::get();
        return view('products', compact('data', 'request'));
    }

    public function create_products(){
        return view('create_products');
    }

    public function simpan_products(Request $request){
        $validator = validator::make($request->all(),[
            'title' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image_uri' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator); 

        $image = $request->file('image_uri');
        $filename = time().$image->getClientOriginalName();
        $path = 'foto-product/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($image));

        $data[('title')] = $request->title;
        $data[('sku')] = $request->sku;
        $data[('price')] = $request->price;
        $data[('description')] = $request->description;
        $data[('image_uri')] = $filename;

        Products::create($data);

        return redirect()->route('admin.products');

    }

    public function edit_products(Request $request,$id){
        $data = Products::find($id);
        return view('edit_products',compact('data'));
    }

    public function update_products(Request $request, $id){
        $validator = validator::make($request->all(),[
            'title' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image_uri' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator); 

        $image = $request->file('image_uri');
        $filename = time().$image->getClientOriginalName();
        $path = 'foto-product/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($image));

        $data[('title')] = $request->title;
        $data[('sku')] = $request->sku;
        $data[('price')] = $request->price;
        $data[('description')] = $request->description;
        $data[('image_uri')] = $filename;

        Products::whereId($id)->update($data);

        return redirect()->route('admin.products');
    
    }

    public function hapus_products(Request $request,$id){
        $data = Products::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect()->route('admin.products');
    }


}
