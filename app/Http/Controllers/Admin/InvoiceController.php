<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use App\Models\Frontend\Order;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceOrderMailable;
use App\Models\Frontend\OrderItems;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function view($order_id)
    {
        $order = Order::findOrFail($order_id);
        $orderItems = OrderItems::where('order_id', $order_id)->get();
        return view('admin.invoice.generate_invoice', compact('order', 'orderItems'));
    }

    public function generate($order_id)
    {
        $order = Order::findOrFail($order_id);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.invoice.generate_invoice', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-' . $order->id . '-' . $todayDate . '.pdf');
    }

    public function sendMail(int $orderId)
    {
        try {
            $order = Order::findOrFail($orderId);
            Mail::to("$order->email")->send(new InvoiceOrderMailable($order));
            return redirect()->route('orders.show', $orderId)->with('success_msg', __('message.Mail Send'));
        } catch(\Exception $e) {
            return redirect()->route('orders.show', $orderId)->with('error_msg', __('message.Something Wrong'));
        }
    }
}
