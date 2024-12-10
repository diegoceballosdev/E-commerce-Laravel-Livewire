<?php 
 
namespace App\Http\Controllers;
 
use App\Mail\OrderCompletedMail;
use App\Models\Order;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

 
class StripeController extends Controller
{

    public function cancelBuy(Request $request)
    {
        //Actualizamos la Orden de Compra:
        $orderId = $request->get('order_id');
        $order = Order::findOrFail($orderId);

        // Cambiamos el estado a "COMPLETADO" una vez que se confirma el pago
        $order->order_status = 'CANCELADO';
        $order->save();

        return Redirect::to('/shopping-cart');
    }
 
    public function session(Request $request)
    {
        // Datos de Request para la Orden de Compra:

        $nuevaOrden = new Order();
        
        $nuevaOrden->user_id = Auth::id();
        $nuevaOrden->buyer_name = $request->name;
        $nuevaOrden->buyer_surname = $request->surname;
        $nuevaOrden->buyer_dni = $request->dni;
        $nuevaOrden->buyer_tel = $request->tel;
        $nuevaOrden->products = $this->getCartItems();
        $nuevaOrden->shipping_address = [
            $request->address,
            $request->locality,
            $request->province,
            $request->postalcode,
        ];
        $nuevaOrden->payment_total = $request->total;
        $nuevaOrden->save();

        // Datos del Checkout

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $cartItems = $this->getCartItems();
        $lineItems = [];
 
        foreach ($cartItems as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'ARS',
                    'product_data' => [
                        'name' => $item->product->name,
                    ],
                    'unit_amount' => $item->product->price * 100, // Convertir precio a centavos como requiere Stripe
                ],
                'quantity' => $item->quantity,
            ];
        }

        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('success',['order_id' => $nuevaOrden->id]),
            'cancel_url' => route('cancel-buy',['order_id' => $nuevaOrden->id]),
        ]);
 
        return redirect()->away($session->url);
    }
 
    public function success(Request $request)
    {
        //Actualizamos la Orden de Compra -----------------------------------
        $orderId = $request->get('order_id');
        $order = Order::findOrFail($orderId);

        //Cambiamos el estado a "COMPLETADO"
        $order->order_status = 'PAGADO';
        $order->save();

        //Stock y Carrito ---------------------------------------------------
        $cartItems = $this->getCartItems();

        //Reducir Stock y Aumentar Contador Venta
        foreach($cartItems as $item){
            $item->product->stock -= $item->quantity;
            $item->product->sale += $item->quantity;
            $item->product->save();
        }

        //Vaciar carrito
        foreach($cartItems as $item){
            $item->delete();
        }

        //Enviamos EMAIL de COMPRA EXITOSA -----------------------------------

        Mail::to($order->user->email)->send(new SendMail($order));

        //Redirijimos a la vista de Compras/Ordenes:
        return Redirect::to('/purchases');
    }

    public function getCartItems()
    {
        return ShoppingCart::with('product')
            ->where('user_id', Auth::id())
            ->get();
    }
}