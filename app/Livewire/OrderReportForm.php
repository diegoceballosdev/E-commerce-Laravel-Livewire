<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderReportForm extends Component
{

    public $order_quantity;
    public $order_sortField;
    public $order_sortDirection;

    //public $product_fields = [];

    public function generateReportPDF(){


        $this->validate([
            //'product_fields' => 'required|array',
            'order_sortField' => 'required|not_in:""',
            'order_sortDirection' => 'required|not_in:""',
            //'product_quantity' => 'numeric',
        ]);

        // Configuramos la consulta:
        $ordersQuery = Order::with('user')
        ->orderBy($this->order_sortField, $this->order_sortDirection);

        if(!empty($this->order_quantity)){
            $ordersQuery->limit($this->order_quantity);
        }

        $orders = $ordersQuery->get();

        // Generamos el PDF
        $pdf = Pdf::loadView('livewire.viewReportPDF.order-report',compact("orders"))->setPaper('a4', 'landscape');

        // Devolvemos el PDF al navegador: usamos esta forma para evitar ERROR UTF-8 de caracteres
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
            }, 'order-report.pdf');
    }

    public function render()
    {
        return view('livewire.order-report-form')->layout("admin-layout");
    }
}
