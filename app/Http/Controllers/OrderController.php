<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function cart_to_processing (Request $request){
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
}
