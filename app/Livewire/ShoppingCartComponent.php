<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;;

class ShoppingCartComponent extends Component
{
    public $go_to_pay = true;
    public $cartItems = [];
    public $subtotal;
    public $vat;
    public $discount;
    public $total;

    public $pageTitle = '';

    protected $listeners = [
        'cartUpdated' => 'render',
    ];
    
    public function mount(){
       $this->cartItems = $this->getCartItems();
        $this->calculateTotals();
        //dd(count($this->cartItems));
    }

    //calculate the totals
    public function calculateTotals()
    {
        $this->subtotal = $this->cartItems->sum(function($item) {
            return $item->quantity * $item->product->price;
        });
        $this->vat = $this->subtotal * 0; // 0% VAT example
        $this->discount = 0; // Apply your discount logic here (10%)
        $this->total = ($this->subtotal + $this->vat) * (1 - $this->discount);
    }

    //get the details of shopping cart
    public function getCartItems()
    {
        return ShoppingCart::with('product')
            ->where('user_id', Auth::id())
            ->get();
    }
    //adding item to cart
    public function addToCart($productId)
    {
        $cartItem = ShoppingCart::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1; // increment its quantity
            $cartItem->save();
        } else {
            ShoppingCart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }
        //dispatch
        $this->dispatch('cartUpdated');
    }

    //update cart function
    public function updateQuantity($cartItemId, $quantity)
    {

        $cartItem = ShoppingCart::find($cartItemId);
        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();
            $this->dispatch('cartUpdated');
        }
    }

    //remove items from the cart
    public function removeItem($cartItemId)
    {
        $cartItem = ShoppingCart::find($cartItemId);
        if ($cartItem) {
            $cartItem->delete();
            $this->dispatch('cartUpdated');
        }
    }

    public function clearCart()
    {
        foreach($this->cartItems as $item){
            $item->delete();
        }
        $this->cartItems = []; // Reset cart items
        $this->dispatch('cartUpdated'); // Dispatch event to update other components
    }

    public function render()
    {
        $this->cartItems = $this->getCartItems();
        $this->calculateTotals();

        return view('livewire.shopping-cart-component', [
            'cartItems' => $this->cartItems
        ])->title('E-commerce | Shopping cart');
    }

}