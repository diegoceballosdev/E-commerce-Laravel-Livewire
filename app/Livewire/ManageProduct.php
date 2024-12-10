<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ManageProduct extends Component
{
    public function render()
    {
        return view('livewire.manage-product')
        ->layout('admin-layout');
    }
}
