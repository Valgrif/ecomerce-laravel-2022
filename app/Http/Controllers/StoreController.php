<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Role;
use App\Models\User;

class StoreController extends Controller
{
    public function front_page(Request $request)
    {
        $user = auth()->user();

        if ($user != null) {
            $cart = $user->orders
                ->sortByDesc('created_at')
                ->firstWhere('status', 'cart');

            if ($cart == null) {
                $cart = Order::create([
                    'user_id' => $user->id,
                    'total_price' => 0,
                    'delivery_address' => "",
                    'status' => "cart",
                ]);
            }
        } else {
            $cart = null;
        }

        return view('public.front-page', [
            'products' => Product::all(),
            'cart' => $cart,
        ]);
    }
}
