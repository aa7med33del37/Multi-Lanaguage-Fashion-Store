<?php

namespace App\Http\Livewire\Frontend\Shop;

use Livewire\Component;
use App\Models\Frontend\Cart;
use App\Models\Frontend\Review;
use App\Models\Frontend\Wishlist;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProductView extends Component
{
    use LivewireAlert;

    public $product, $quantityCount = 1, $productColorQtyStatus, $colorItemId,
    $colorSelected, $rate, $review, $comment, $bold;

    public function selectedColor($colorItemId)
    {
        $this->productColorId = $colorItemId;
        $this->productColor = $this->product->productColors()->where('id', $colorItemId)->first();
        if ($this->productColor->quantity == 0) {
            $this->productColorQtyStatus = "Out Of Stock";
        } elseif ($this->productColor->quantity > 0) {
            $this->productColorQtyStatus = 'In Stock';
        }
    }

    public function decrementQty()
    {
        if($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }
    public function incrementQty()
    {
        $this->quantityCount++;
    }



    public function addToCart($productId)
    {
        if (Auth::check()) {
            if ($this->product->productColors->count() > 0) {
                if ($this->productColorQtyStatus != NULL) {
                    $this->colorSelected = $this->productColor->color->color;
                    if ($this->productColor->quantity > 0) {
                        if ($this->quantityCount <= $this->productColor->quantity) {
                            $checkCart = Cart::where('product_id', $productId)->where('product_color_id', $this->productColorId)->exists();
                                if($checkCart) {
                                    $this->alert('info', __('message.Product Exist'), [
                                        'toast' => false,
                                    ]);
                                } else {
                                    Cart::create([
                                        'user_id' => Auth::user()->id,
                                        'email'   => Auth::user()->email,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'price' => $this->product->selling_price ?? $this->product->original_price,
                                        'quantity' => $this->quantityCount,
                                    ]);
                                    $this->alert('success', __('message.Product To Cart'), [
                                        'toast' => false,
                                        'icon' => 'success',
                                    ]);
                                }
                        }else {
                            $this->alert('error', __('message.There Is') . $this->productColor->quantity . __('message.Only Color Items'), [
                                'toast' => false,
                            ]);
                        }
                    } else {
                        $this->alert('error', __('message.Color Finish'), [
                            'toast' => false,
                        ]);
                    }
                } else {
                    $this->alert('warning', __('message.Select Color'), [
                        'toast' => false,
                    ]);
                }
            } else {
                if ($this->product->quantity > 0) {
                    if ($this->quantityCount <= $this->product->quantity) {
                        $checkCart = Cart::where('product_id', $productId)->exists();
                        if($checkCart) {
                            $this->alert('info', __('message.Product Exist'), [
                                'toast' => false,
                                'icon' => 'info',
                            ]);
                        } else {
                            Cart::create([
                                'user_id' => Auth::user()->id,
                                'email'   => Auth::user()->email,
                                'product_id' => $productId,
                                'price' => $this->product->selling_price ?? $this->product->original_price,
                                'quantity' => $this->quantityCount,
                            ]);
                            $this->alert('success', __('message.Product To Cart'), [
                                'toast' => false,
                            ]);
                        }
                    } else {
                        $this->alert('error', __('message.There Is') . ' ' . $this->product->quantity . ' ' . __('message.Only Items'), [
                            'toast' => false,
                        ]);
                    }
                } else {
                    $this->alert('error', __('message.Product Finish'), [
                        'toast' => false,
                    ]);
                }
            }
        } else {
            $this->alert('warning', __('message.Please Login'), [
                'toast' => false,
            ]);
        }
    }

    public function AddToWishlist($productId)
    {
        if (Auth::check()) {
            $check = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $productId)->exists();
            if ($check) {
                $this->alert('warning', __('message.Wishlist Exist'), [
                    'toast' => false,
                ]);
            } else {
                Wishlist::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $productId,
                ]);
                $this->alert('success', __('message.Wishlist Add'), [
                    'toast' => false,
                ]);
            }
        } else {
            $this->alert('warning', __('message.Please Login'), [
                'toast' => false,
            ]);
        }
    }

    public function addReveiw($productId)
    {
        if (Auth::check()) {
            Review::create([
                'user_id' => Auth::user()->id,
                'product_id' => $productId,
                'rating'    => $this->rate,
                'review' => $this->review,
                'comment' => $this->comment,
            ]);
            $this->alert('success', __('message.Review Thanks'), [
                'toast' => false,
            ]);
        } else {
            $this->alert('warning', __('message.Please Login'), [
                'toast' => false,
            ]);
        }
    }

    public function like($reviewId)
    {
        if (Auth::check()) {
            $review = Review::where('id', $reviewId)->first();
            $review->increment('like', '1');
            $this->bold = 'font-weight-bold';
            $this->alert('success', 'Thanks for your Review', [
                'toast' => false,
            ]);
        } else {
            $this->alert('warning', __('message.Please Login'), [
                'toast' => false,
            ]);
        }
    }

    public function render()
    {
        $category = $this->product->category;
        $reviews = Review::where('product_id', $this->product->id)->orderBy('id', 'DESC')->get();
        return view('livewire.frontend.shop.product-view', [
            'category' => $category,
            'reviews' => $reviews,
        ]);
    }
}
