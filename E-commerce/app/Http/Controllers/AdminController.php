<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function product()
    {
        return view('admin.product');
    }

    public function uploadproduct(Request $request,$id) {
        $data = new Product();

        // Ensure you call the file() method on the $request object
        $image = $request->file('file'); // Assuming 'file' is the name of your input field
    
        if ($image) { 
            $imagename = time() . '.' . $image->getClientOriginalExtension(); 
            $image->move('productimage', $imagename); 
    
            $data->image = $imagename; 
        }
    
     
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
    
        $data->save(); 
    
        return redirect()->back(); 
    }

    public function showproduct()
    {
        $data=product::all();
        return view('admin.showproduct',compact('data'));
    }

    public function showorder()
    {
        $order=order::all();
        return view('admin.showorder',compact('order'));
    }


    public function updateview($id)
    {
        // Find the product by its ID
        $product = Product::find($id);

        // Check if the product exists
        if (!$product) {
            return redirect()->back()->withErrors('Product not found.');
        }

        // Return the view for updating the product
        return view('admin.updateview', compact('product'));
    }

    // public function deleteproduct($id)
    // {
    //     $data=product::file($id);
    //     $data->delete();
    //     return redirect()->back();
    // }

    public function deleteproduct($id)
    {
        $data=product::find($id);
        $data->delete();
        return redirect()->back();
    }

   public function updatestatus($id)
   {

    $order=order::find($id);
    $order->status='delivered';
    $order->save();
    return redirect()->back();
   }

    
}
