<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCategoryList extends Component
{
    use WithPagination;

    public $category;
    public $categoryId; // Cambiado de $id a $categoryId para evitar conflictos
    public $search = '';

    public function mount($id)
    {
        $this->categoryId = $id; // Asignar el ID de la categoría
        $this->category = Category::findOrFail($id);
    }

    public function updatedSearch()
    {
        $this->resetPage(); // Reinicia la paginación al actualizar la búsqueda
    }

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

        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        $products = Product::where('category_id', $this->categoryId)
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(3);

        return view('livewire.product-category-list', [
            'products' => $products,
        ]);
    }
}
