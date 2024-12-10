<?php

namespace App\Livewire;

use App\Models\Order;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class OrderDetails extends Component
{
    public $order;

    public function mount($id){

        $this->order = Order::find($id);
    }

    public function generateReportPDF(){

        $order = $this->order;

        // Generamos el PDF
        $pdf = Pdf::loadView('livewire.viewReportPDF.order-details-report',compact("order"));

        // Devolvemos el PDF al navegador: usamos esta forma para evitar ERROR UTF-8 de caracteres
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
            }, 'order-details-report.pdf');
    }

    public function render()
    {
        if(Auth::user()->hasRole('Admin')){

            return view('livewire.order-details')->layout("admin-layout");
        }
        if(Auth::user()->hasRole('User')){

            return view('livewire.order-details');
        }

        
    }
}
