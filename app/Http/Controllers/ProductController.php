<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ProductController extends Controller
{
    public function AddProduct(){
        return view("backend.product.add");
    }

    public function StoreProduct(Request $request){
        if ($request->product_code == "") {
            $product_code = hexdec(uniqid());
        }else {
            $product_code = $request->product_code;
        }


        $product_id = Product::insertGetId([
            'product_name' => $request->product_name,
            'product_code' => $product_code,
            'product_qty' => $request->product_qty,
            'price' => $request->price,
            'gst'=>$request->gst,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('add.product')->with($notification);
    }

    public function ManageProduct(){
        $products = Product::latest()->get();
        return view("backend.product.manage", compact("products"));
    }
    
    public function EditProduct($id){
        $product = Product::where("id",$id)->get();
        return view("backend.product.edit", compact("product"));
    }

    public function UpdateProduct(Request $request, $id){
      $data = array(
        'product_name' => $request->product_name,
        'product_qty' => $request->product_qty,
        'price' => $request->price,
        'gst'=>$request->gst,
        'created_at' => Carbon::now(),
      );

      Product::where("id",$id)->Update($data);

      $notification = array(
        'message' => 'Product Updated Successfully',
        'alert-type' => 'success'
     );

     return redirect()->route('manage.product')->with($notification);
    }

    public function BarcodeDownload($product_code){
        $pdf = PDF::loadView('backend.pdf.barcode', compact("product_code"));
        return $pdf->stream();
    }

    public function DeleteProduct($id)
    {
        Product::where("id",$id)->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ScanProduct($id)
    {
       
        $items = Orderitem::where("order_id",$id)->get();
        // $product_id = $request->id;
        // $product_code = IdGenerator::generate(['table' => 'products', 'field' => 'product_code', 'length' => 12, 'prefix' =>  2]);
         return view('backend.product.product_scanner', compact("items","id"));
    }

    public function Scandata($p_code){
        $data = Product::where("product_code",$p_code)->get();
        return json_encode($data);

    }

    public function ViewInvoice($id){
        $items = Orderitem::where("order_id",$id)->get();
        $total_price = 0;
        foreach ($items as $item) {
            $total_price = $item->total_price + $total_price;
        }
        Order::where("id",$id)->update(array("total_price"=>$total_price, "invoice"=>uniqid()));

        //pdf print 

        $data = Order::where("id",$id)->get();
        $pdf = PDF::loadView('backend.pdf.invoice', compact("data","items"));
        $new = array(
            "status"=>"inactive",
        );
        Orderitem::where("status","active")->update($new);
        return $pdf->stream();

    }
}
