<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class AddCategoryForm extends Component
{
    public $category_name = '';

    public function save(){
        $this->validate([
            'category_name' => 'required',
        ]);

        $category = new Category();
        $category->name = $this->category_name;

        $category->save();

        return $this->redirect('/categories');
    }


    public function render()
    {
        return view('livewire.add-category-form')->layout('admin-layout');
    }
}
