<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Header extends Component
{
    public $category_list;
    public function mount(){
        $this->category_list = Category::all();
    }
    public function render()
    {
        return view('livewire.header');
    }
}
