<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function cart_to_processing(Request $request)
    {
        $validated = $request->validate([
            "address" => "required",
            "address2" => "",
            "country" => "required",
            "state" => "required",
            "zip" => "required|min:0|max:99999"
        ]);

        $cart = get_cart();

        $cart->delivery_address =
            $validated["address"] . ", " .
            $validated["address2"] . ", " .
            $validated["country"] . ", " .
            $validated["state"] . ", " .
            $validated["zip"];

        $cart->status = "processing";
        $cart->save();

        return redirect(route('store'));
    }

    public function processing_to_sent(Request $request){
        $validated = $request->validate([
            "id" => "required|exists:orders,id",
            "tracking" => "required",
        ]);

        $order = Order::find($validated['id']);
        $order->traking_number = $validated['traking'];
        $order->status = "sent";
        $order->save();

        return redirect(route('list-order'));
    }

    public function list_orders(Request $request)
    {
        return view('admin.orders-page', [
            "carts" => Order::where('status','cart')->get(),
            "processing" => Order::where('status','processing')->get(),
            "sent" => Order::where('status','sent')->get()

        ]);
    }
}
