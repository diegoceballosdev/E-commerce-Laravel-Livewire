<?php

namespace App\Livewire;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Category;

class CategoryReportForm extends Component
{
    public $category_quantity;
    public $category_sortField;
    public $category_sortDirection;

    public function generateReportPDF(){

        $this->validate([
            'category_sortField' => 'required|not_in:""',
            'category_sortDirection' => 'required|not_in:""',
        ]);

        // Configuramos la consulta:
        $categoriesQuery = Category::orderBy($this->category_sortField, $this->category_sortDirection);

        if(!empty($this->category_quantity)){
            $categoriesQuery->limit($this->category_quantity);
        }

        $categories = $categoriesQuery->get();

        // Generamos el PDF
        $pdf = Pdf::loadView('livewire.viewReportPDF.category-report',compact("categories"));

        // Devolvemos el PDF al navegador: usamos esta forma para evitar ERROR UTF-8 de caracteres
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
            }, 'category-report.pdf');
    }

    public function render()
    {
        return view('livewire.category-report-form')->layout('admin-layout');
    }
}
