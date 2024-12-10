<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{
    public function index(Request $request){

        $cartItems = $this->getCartItems();

        $subtotal = $request->subtotal;
        $discount = $request->discount;
        $vat = $request->vat;
        $total = $request->total;

        return view('livewire.shipping-section', compact('cartItems','total','vat','subtotal','discount'));
    }

    public function getCartItems()
    {
        return ShoppingCart::with('product')
            ->where('user_id', Auth::id())
            ->get();
    }
}