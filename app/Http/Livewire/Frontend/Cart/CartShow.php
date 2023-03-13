<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Frontend\Cart;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CartShow extends Component
{
    use LivewireAlert;
    public $totalAmount;
    public function decrementQty($cartId)
    {
        $cartItem = Cart::where('id', $cartId)->where('user_id', Auth::user()->id)->first();
        if ($cartItem->quantity > 1) {
            if ($cartItem->productColor()->count() > 0) {
                if ($cartItem->productColor->quantity > $cartItem->quantity) {
                    $cartItem->increment('quantity');
                    $this->alert('success', 'Quantity updated', [
                        'toast' => false,
                        'position' => 'middle',
                    ]);
                } else {
                    $this->alert('error', 'There is only ' . $cartItem->productColor->quantity . ' items in this color', [
                        'toast' => false,
                        'position' => 'middle',
                    ]);
                }
            } else {
                if ($cartItem->product->quantity > $cartItem->quantity) {
                    $cartItem->increment('quantity');
                    $this->alert('success', 'Quantity updated', [
                        'toast' => false,
                        'position' => 'middle',
                    ]);
                } else {
                    $this->alert('error', 'There is only ' . $cartItem->product->quantity . ' items', [
                        'toast' => false,
                        'position' => 'middle',
                    ]);
                }
            }
        }

    }

    public function incrementQty($cartId)
    {
        $cartItem = Cart::where('id', $cartId)->where('user_id', Auth::user()->id)->first();

        if ($cartItem->productColor()->count() > 0) {
            if ($cartItem->productColor->quantity > $cartItem->quantity) {
                $cartItem->increment('quantity');
                $this->alert('success', 'Quantity updated', [
                    'toast' => false,
                    'position' => 'middle',
                ]);
            } else {
                $this->alert('error', 'There is only ' . $cartItem->productColor->quantity . ' items in this color', [
                    'toast' => false,
                    'position' => 'middle',
                ]);
            }
        } else {
            if ($cartItem->product->quantity > $cartItem->quantity) {
                $cartItem->increment('quantity');
                $this->alert('success', 'Quantity updated', [
                    'toast' => false,
                    'position' => 'middle',
                ]);
            } else {
                $this->alert('error', 'There is only ' . $cartItem->product->quantity . ' items', [
                    'toast' => false,
                    'position' => 'middle',
                ]);
            }
        }
    }

    public function removeCartItem($cartId)
    {
        $cartItem = Cart::where('id', $cartId)->where('user_id', Auth::user()->id)->first();
        if ($cartItem) {
            $cartItem->delete();
            $this->alert('success', 'Item deleted from your cart', [
                'toast' => false,
                'position' => 'middle',
            ]);
        } else {
            $this->alert('error', 'Something went wrong', [
                'toast' => false,
                'position' => 'middle',
            ]);
        }
    }

    public function render()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->where('email', Auth::user()->email)->get();
        return view('livewire.frontend.cart.cart-show', [
            'carts' => $carts,
        ]);
    }
}
