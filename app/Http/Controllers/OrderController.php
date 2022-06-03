<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderitem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;

class OrderController extends Controller
{
    public function Order()
    {
        return view("backend.order.order");
    }

    public function OrderStore(Request $request)
    {
        $request->validate([
            "customer_name" => "required",
            "phone" => "required"
        ]);

            $id =  Order::insertGetId([
                "customer_name" => $request->customer_name,
                "phone" => $request->phone,
                "status" => "unpaid",
                "user_id"=>session("USER_ID"),
                'order_date' => Carbon::now()->format('d F Y'),
                'order_month' => Carbon::now()->format('F'),
                'order_year' => Carbon::now()->format('Y'),
                'created_at' => Carbon::now(),
            ]);

        return redirect()->route("edit.scan",$id);
    }

    public function AddInvoice(Request $request){
        $request->validate([
           "product_code"=>"required",
           "product_name"=>"required",
           "product_qty"=>"required",
           "price"=>"required",
        ]);

       $order_id = $request->id;
        $product_code = $request->input("product_code");
        $product = Product::where("product_code",$product_code)->get();
        $product_name = $request->input("product_name");
        $qty = $request->input("product_qty");
        $price = $request->input("price");



        if($product[0]->gst == ""){
            $total_amount = $price * $qty;
        }else{
            $gst_amount = ($price * $qty) * ($product[0]->gst/100);
            $total_amount = ($price * $qty) + $gst_amount;
        }


        Orderitem::insert([
            "order_id"=> $order_id,
           "product_id"=>$product_code,
           "quantity"=>$qty,
           "price"=>$price,
           "total_price"=>$total_amount,
           "gst"=>$product[0]->gst,
        ]);

        $notification = array(
            'message' => 'Product added to invoice',
            'alert-type' => 'success'
        );

        $p_qty = $product[0]->product_qty; 
        $new_qty = $p_qty - $qty;
        $data = array(
            "product_qty"=>$new_qty
        );

        Product::where("product_code",$product_code)->update($data);

        return redirect()->back()->with($notification);
    }

    public function EditInvoice($id){
        $item = Orderitem::where("id",$id)->get();
        return view("backend.order.edit_item", compact("item"));
    }

    public function UpdateInvoice(Request $request, $id){
        $gst = $request->gst;
        $price = $request->price;
        $qty = $request->quantity;
        $order_id = $request->order_id;

        if($gst == ""){
            $total_amount = $price * $qty;
        }else{
            $gst_amount = ($price * $qty) * ($gst/100);
            $total_amount = ($price * $qty) + $gst_amount;

        }
        $data = array(
            "product_id"=>$request->product_id,
            "price"=> $price,
            "total_price"=>$total_amount,
            "quantity"=>$qty,
        );

        Orderitem::where("id",$id)->update($data);
        return redirect()->route("edit.scan",$order_id);

    }

    public function DeleteInvoice($id){
        Orderitem::where("id",$id)->delete();
        return redirect()->back();
    }

    public function ViewOrder(){
        $orders = Order::where("status","unpaid")->latest()->get();
        return view("backend.order.view_order", compact("orders"));
    }

    public function ViewOrderDetails($id){
      $details =  Orderitem::where("order_id",$id)->get();
      return view("backend.order.details", compact("details"));
    }


}
