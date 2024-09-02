<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chat;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{
    public function view_category()
    {
         $data=Category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request)
    {
        $category=new Category;
        $category->category_name=$request->category;
        $category->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('category add successfully');
        return redirect()->back();
    }
    public function delete_category($id)
    {
          $data=Category::find($id);
          $data->delete();
          toastr()->timeOut(5000)->closeButton()->addSuccess('category deleted');
          return redirect()->back();

    }
    public function edit_category($id)
    {
         $data=Category::find($id);
        return view('admin.edit_category',compact('data'));
    }
    public function update_category(Request $request,$id)
    {
         $data=Category::find($id);
         $data->category_name=$request->category;
         $data->save();
         toastr()->timeOut(5000)->closeButton()->addSuccess('category Updated');
         return redirect('/view_category');
    }
    public function add_product()
    {
        $category=Category::all();
         return view('admin.add_product',compact('category'));
    }
    public function upload_product(Request $request)
    {
       $data=new Product();
       $data->title=$request->title;
       $data->description=$request->description;
       $data->price=$request->price;
       $data->category=$request->category;
       $data->quantity=$request->qty;
      $img=$request->image;
      if($img)
      {
         $imgname=time().'.'.$img->getClientOriginalExtension();
         $request->image->move('products',$imgname);
         $data->image=$imgname;
      }


       $data->save();
       return redirect()->back();



    }
    public function view_product()
    {
         $product=Product::paginate(3);
          return view('admin.view_product',compact('product'));
    }
    public function delete_product($id)
    {
        $data=Product::find($id);
        $img_path=public_path('products/'.$data->image);
        if(file_exists($img_path))
        {
              unlink($img_path);
        }
        $data->delete();
        toastr()->timeOut(5000)->closeButton()->addSuccess('product deleted successfully');
        return redirect()->back();
    }
    public function update_product($id)
    {
         $data=Product::where('slug',$id)->get()->first();
         return view('admin.update_page',compact('data'));
    }
    public function edit_product(Request $request , $id)
    {
         $data=Product::find($id);
         $data->title=$request->title;
         $data->description=$request->description;
         $data->price=$request->price;
         $data->quantity=$request->qty;
         $img=$request->image;
         if($img)
         {
             $imgname=time().'.'.$img->getClientOriginalExtension();
             $img->move('products',$imgname);
             $data->image=$imgname;
         }
         $data->save();
         toastr()->timeOut(5000)->closeButton()->addSuccess('Product Updated');
         return redirect('view_product');


    }
    public function product_search(Request $request)
    {
      $sc=$request->search;
      $product=Product::where('title','LIKE','%'.$sc.'%')->orWhere('title','LIKE','%'.$sc.'%')->paginate(3);
      return view('admin.view_product',compact('product'));

    }
   public function view_order()
   {
     $data=Order::all();
      return view('admin.order',compact('data'));
   }
   public function on_the_way($id)
   {
       $data=Order::find($id);
       $data->status='on the way';
       $data->save();
       return redirect('/view_order');

   }
   public function delivered($id)
   {
       $data=Order::find($id);
       $data->status='delivered';
       $data->save();
       return redirect('/view_order');

   }
   
   public function print_pdf($id)
   {
    $data=Order::find($id);
     $pdf = Pdf::loadView('admin.invoice',compact('data'));
     return $pdf->download('invoice.pdf');
   }

   public function message()
   {
     $data=Chat::all();
      return view('admin.message',compact('data'));
   }
   public function update_message(Request $request, $id)
   {
    $data=Chat::find($id);
    $data->admin_chat=$request->message;
    toastr()->timeOut(5000)->closeButton()->addSuccess('message send successfully');
    $data->save();
    return redirect()->back();

   }


}
