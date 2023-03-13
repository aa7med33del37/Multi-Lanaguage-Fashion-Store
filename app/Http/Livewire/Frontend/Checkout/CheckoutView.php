<?php

namespace App\Http\Livewire\Frontend\Checkout;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Frontend\Cart;
use App\Models\Frontend\Order;
use App\Models\Frontend\Address;
use App\Models\Frontend\OrderItems;
use App\Models\Frontend\Governorate;
use Illuminate\Support\Facades\Auth;

class CheckoutView extends Component
{
    public $totalProductAmount = 0;
    public $cart, $totalAmount, $name, $phone, $governorate_id, $city, $pincode, $address, $company, $notes, $addressSelected, $activeBorder;

    protected $listeners = ['validationForAll'];
    public function validationForAll()
    {
        $this->validate();
    }

    public function rules()
    {
        if ($this->addressSelected) {
            return [
                'name'    => 'nullable|string',
                'phone'   => 'nullable',
                'address' => 'nullable|string',
                'governorate_id' => 'nullable|integer',
                'city'    => 'nullable|integer',
                'pincode' => 'nullable|integer',
                'notes'   => 'nullable|string',
                'company' => 'nullable|string',
            ];
        } else {
            return [
                'name'    => 'required|string',
                'phone'   => 'required',
                'address' => 'required|string',
                'governorate_id' => 'required|integer',
                'city'    => 'required|integer',
                'pincode' => 'nullable|integer',
                'notes'   => 'nullable|string',
                'company' => 'nullable|string',
            ];
        }
    }

    public function codPlaceOrder()
    {
        $this->validate();
        if ($this->addressSelected) {
            $address = Address::where('id', $this->addressSelected)->first();
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'name' => $address->name,
                'email' => Auth::user()->email,
                'phone' => $address->phone,
                'governorate_id' => $address->governorate_id,
                'city' => $address->city,
                'pincode' => $address->pincode ?? NULL,
                'address' => $address->address ?? NULL,
                'notes' => $address->notes ?? NULL,
                'company' => $address->company ?? NULL,
                'status_message' => 'in progress',
                'tracking_no' => 'funda-' . Str::random(10),
                'payment_mode' => 'cash on delivery',
            ]);
        } else {
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'name' => $this->name,
                'email' => Auth::user()->email,
                'phone' => $this->phone,
                'governorate_id' => $this->governorate_id,
                'city' => $this->city,
                'pincode' => $this->pincode ?? NULL,
                'address' => $this->address ?? NULL,
                'notes' => $this->notes ?? NULL,
                'company' => $this->company ?? NULL,
                'status_message' => 'in progress',
                'tracking_no' => 'funda-' . Str::random(10),
                'payment_mode' => 'cash on delivery',
            ]);

            Auth::user()->address()->create([
                'user_id' => Auth::user()->id,
                'name' => $this->name,
                'email' => Auth::user()->email,
                'phone' => $this->phone,
                'city' => $this->city,
                'governorate_id' => $this->governorate_id,
                'pincode' => $this->pincode ?? '',
                'address' => $this->address ?? '',
                'company' => $this->company ?? '',
            ]);
        }

        foreach($this->cart as $cartItem) {
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_color_id' => $cartItem->product_color_id ?? NULL,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
            ]);

            if ($cartItem->product_color_id != NULL) {
                $cartItem->productColor()->where('id', $cartItem->product_color_id)->decrement('quantity', $cartItem->quantity);
            }
            $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity', $cartItem->quantity);
        }

        Cart::where('user_id', Auth::user()->id)->delete();


        return redirect('/thank-you');
    }

    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', Auth::user()->id)->get();
        foreach($this->carts as $cartItem) {
            $this->totalProductAmount +=  $cartItem->product->price  * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }

    public function render()
    {
        $this->cart = Cart::where(['user_id' => Auth::user()->id, 'email' => Auth::user()->email])->get();
        $this->name = Auth::user()->name ?? '';
        $this->userAddresses = Address::where('user_id', Auth::user()->id)->get();
        $governorates = Governorate::all();
        return view('livewire.frontend.checkout.checkout-view', [
            'cart' => $this->cart,
            'userAddresses' => $this->userAddresses,
            'governorates'  => $governorates,
            'totalProductAmount' => $this->totalProductAmount,
        ]);
    }
}
