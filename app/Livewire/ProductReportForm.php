<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductReportForm extends Component
{
    public $product_quantity;
    public $product_sortField;
    public $product_sortDirection;

    //public $product_fields = [];

    public function generateReportPDF(){


        $this->validate([
            //'product_fields' => 'required|array',
            'product_sortField' => 'required|not_in:""',
            'product_sortDirection' => 'required|not_in:""',
            //'product_quantity' => 'numeric',
        ]);

        // Configuramos la consulta:
        $productsQuery = Product::with('category')
        ->orderBy($this->product_sortField, $this->product_sortDirection);

        if(!empty($this->product_quantity)){
            $productsQuery->limit($this->product_quantity);
        }

        $products = $productsQuery->get();

        // Generamos el PDF
        $pdf = Pdf::loadView('livewire.viewReportPDF.product-report',compact("products"));

        // Devolvemos el PDF al navegador: usamos esta forma para evitar ERROR UTF-8 de caracteres
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
            }, 'product-report.pdf');
    }

    public function render()
    {
        return view('livewire.product-report-form')->layout('admin-layout');
    }
}
