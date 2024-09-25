<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Psy\Readline\Hoa\FileException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        if($products){
            return response()->json($products,200);
        }else return response()->json('no products');
    }

    public function show($id)
    {
        $product = Product::find($id);
        if($product){
            return response()->json($product,200);
        }else return response()->json('product was not found');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'name'=>'required',
            'price'=>'required|numeric',
            'category_id'=>'required|numeric',
            'brand_id'=>'required|numeric',
            'discount'=>'required|numeric',
            'amount'=>'required|numeric',
            'image'=>'required'
        ]);
        $product=new Product();
        $product->name=$request->name;
        $product->price=$request->proce;
        $product->brand_id=$request->brand_id;
        $product->category_id=$request->category_id;
        $product->discount=$request->discount;
        $product->discount=$request->discount;
        if($request->hasfile('image')){
            $path = 'assets/uploads/product' . $product->image;
           if (File::exists($path)){
            File::delete($path);
           }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            try{
                $file->move('assets/uploads/category',$filename);
            }catch(FileException $e){
                dd($e);
            }
            $product->image = $filename;
        }
    }

    public function update($id,Request $request)
    {
        Validator::make($request->all(),[
            'name'=>'required',
            'price'=>'required|numeric',
            'category_id'=>'required|numeric',
            'brand_id'=>'required|numeric',
            'discount'=>'required|numeric',
            'amount'=>'required|numeric',
            'image'=>'required'
        ]);
        $product=new Product();
        if ($product){
            $product->name=$request->name;
            $product->price=$request->proce;
            $product->brand_id=$request->brand_id;
            $product->category_id=$request->category_id;
            $product->discount=$request->discount;
            $product->discount=$request->discount;
            if($request->hasfile('image')){
                $path = 'assets/uploads/product' . $product->image;
               if (File::exists($path)){
                File::delete($path);
               }
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                try{
                    $file->move('assets/uploads/category',$filename);
                }catch(FileException $e){
                    dd($e);
                }
                $product->image = $filename;
            }
            $product->save();
            return response()->json('product update');
        }else return response()->json('product not found');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if($product)
        {
            $product->delete();
            return response()->json('product is deleted');
        }else return response()->json('product was not found');
    }
}
