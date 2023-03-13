<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Frontend\Order;
use Illuminate\Support\Carbon;
use App\Models\Frontend\OrderItems;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $orderItems = OrderItems::where('order_id', $id)->get();
        return view('admin.order.show', compact('order', 'orderItems'));
    }

    public function update(Request $request, $order_id)
    {
        $order = Order::where('id', $order_id)->first();
        if ($order) {
            if ($request->status_message == 'out for delivery') {
                $out_for_delivery_date = Carbon::now();
            }else {
                $out_for_delivery_date = NULL;
            }
            if($request->status_message == 'completed') {
                $out_for_delivery_date = $order->out_for_delivery_date ?? NULL;
                $delivered_date = Carbon::now();
            } else {
                $delivered_date = NULL;
            }
            $order->update([
                'status_message' => $request->status_message,
                'out_for_delivery_date' => $out_for_delivery_date,
                'delivered_date' => $delivered_date,
            ]);
            return redirect()->route('orders.show', $order_id)->with('success_msg', 'Order Status Updated Successfully');
        } else {
            return redirect()->route('orders.show', $order_id)->with('error_msg', 'Something went wrong');
        }
    }
}
