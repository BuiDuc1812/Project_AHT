<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;


class AdminController extends Controller
{
    public function view_category()
    {
        // return view('admin.category');
        $data = category::all();

        return view('admin.category', compact('data'));
    }
    public function add_category(Request  $request)
    {
        $data = new category;
        $data->category_name = $request->category;
        $data->save();
        return redirect()->back()->with('message', 'Thêm thành công danh mục');
    }
    public function delete_category($id)
    {
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Xoá thành công danh mục');
    }
    public function view_product()
    {
        $category = category::all();
        return view('admin.product', compact('category'));
    }
    public function add_product(Request $request)
    {
        $data = new product;
        $data->name = $request->name;
        $data->decription = $request->decription;
        $data->quantity = $request->quantity;
        $data->price = $request->price;
        $data->discount = $request->discount;
        $data->category = $request->category;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('upload', $imagename);
        $data->image = $imagename;

        $data->save();
        return redirect()->back()->with('message', 'Thêm sản phẩm thành công');
    }
    public function show_product()
    {
        $product = product::all();
        return view('admin.show_product', compact('product'));
    }
    public function delete_product($id)
    {
        $product = product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Xoá thành công sản phẩm');
    }
    public function update_product($id)
    {
        $product = product::find($id);
        $category = category::all();
        return view('admin.update_product', compact('product', 'category'));
    }
    public function update_product_confirm(request $request, $id)
    {
        $product = product::find($id);
        $product->name = $request->name;
        $product->decription = $request->decription;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->category = $request->category;

        $image = $request->image;
        if($image){
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('upload', $imagename);
        $product->image = $imagename;
        }
        $product->save();
        return redirect()->back()->with('message', 'Sửa sản phẩm thành công');
    }
    public function order(){
        $order=order::all();
        return view('admin.order',compact('order'));
    }
    public function delivered($id){
        $order=order::find($id);
        $order->delivery_status="delivered";
        $order->save();
        return redirect()->back();
    }
}

