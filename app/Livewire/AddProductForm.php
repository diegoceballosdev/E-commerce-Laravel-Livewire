<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProductForm extends Component
{
    use WithFileUploads;

    public $product_name = '';
    public $product_price = '';
    public $product_stock = '';
    public $product_image; 
    public $product_description = '';
    public $product_category_id = '';
    public $all_categories;

    public function mount(){
        $this->all_categories = Category::all();
    }

    public function save(){
        $this->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required|numeric',
            'product_stock' => 'required|numeric',
            'product_category_id' => 'required',
            'product_image' => 'image|required|mimes:jpg,png', // Validación para cada imagen
        ]);

        $path = $this->product_image->store('products');

        $product = new Product();
        $product->name = $this->product_name;
        $product->description = $this->product_description;
        $product->price = $this->product_price;
        $product->stock = $this->product_stock;
        $product->sale = 0;
        $product->category_id = $this->product_category_id;
        $product->image = $path;

        $product->save();

        return $this->redirect('/products');
    }

    public function render()
    {
        return view('livewire.add-product-form')->layout('admin-layout');
    }
}
