<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyPurchases extends Component
{
    public $my_orders;

    public function mount(){

        $this->my_orders = Order::where("user_id",Auth::id())->where("order_status","PAGADO")->get();

    }

    public function render()
    {
        return view('livewire.my-purchases');
    }
}
