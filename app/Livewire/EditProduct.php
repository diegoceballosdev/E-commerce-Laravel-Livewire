<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


class EditProduct extends Component
{
    use WithFileUploads;

    public $product_details;
    public $product_name = '';
    public $product_description = '';
    public $product_price = '';
    public $product_stock = '';
    public $product_image = '';

    public $category_id;
    public $all_categories;

    public function mount($id)
    {
        $this->product_details = Product::find($id);
        $this->product_name = $this->product_details->name;
        $this->product_description = $this->product_details->description;
        $this->product_price = $this->product_details->price;
        $this->product_stock = $this->product_details->stock;
        $this->category_id = $this->product_details->category_id;
        $this->product_image = $this->product_details->image;

        $this->all_categories = Category::all();
    }

    public function update() {
        $this->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required | numeric',
            'product_stock' => 'required | numeric',
            'category_id' => 'required',
            'product_image' => $this->product_image && !is_string($this->product_image) ? 'image|mimes:jpg,png' : '',
            
        ]);

        if ($this->product_image && !is_string($this->product_image)) {
            // Si hay una nueva imagen, se guarda y se elimina la anterior
            $imagePath = $this->product_image->store('products');
            Storage::delete($this->product_details->image);
        } else {
            // Si no hay una nueva imagen, se mantiene la anterior
            $imagePath = $this->product_details->image; 
        }
    
        $this->product_details->update([
            'name' => $this->product_name,
            'description' => $this->product_description,
            'price' => $this->product_price,
            'stock' => $this->product_stock,
            'category_id' => $this->category_id,
            'image' => $imagePath
        ]);
    
        return redirect('/products');
    }

    public function render()
    {
        return view('livewire.edit-product')->layout('admin-layout');
    }
}
