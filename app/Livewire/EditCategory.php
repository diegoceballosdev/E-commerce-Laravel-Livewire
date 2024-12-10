<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class EditCategory extends Component
{

    public $category_details;
    public $category_name = '';

    public function mount($id)
    {
        $this->category_details = Category::find($id);
        $this->category_name = $this->category_details->name;
    }

    public function update() {
        $this->validate([
            'category_name' => 'required',
        ]);

        $this->category_details->update([
            'name' => $this->category_name,
        ]);
    
        return redirect('/categories');
    }


    public function render()
    {
        return view('livewire.edit-category')->layout('admin-layout');
    }
}
