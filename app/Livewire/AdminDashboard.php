<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class AdminDashboard extends Component
{
    public $total_users;
    public $total_sales;
    public $total_incomes; //INGRESOS
    public $total_products;

    public function mount(){

        $this->total_users = count(User::all());
        $this->total_products =  count(Product::all());
        $this->total_sales = Product::sum('sale');
        $this->total_incomes = Order::where('order_status', 'PAGADO')->sum('payment_total');

    }

    public function render()
    {
        return view('livewire.admin-dashboard')
        ->layout('admin-layout');
    }
}
