<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Frontend\Order;
use App\Models\Frontend\Address;
use App\Models\Frontend\Wishlist;
use App\Models\Frontend\OrderItems;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class FrontendController extends Controller
{
    public function index()
    {
        $result['banners'] = Banner::where('status', '1')->get();
        $result['products'] = Product::where('status', '1')->orderBy('id', 'DESC')->take(12)->get();
        $result['trendingProducts'] = Product::where('status', '1')->where('trending', '1')->orderBy('id', 'DESC')->take(12)->get();
        $result['featuredProducts'] = Product::where('status', '1')->where('featured', '1')->orderBy('id', 'DESC')->take(12)->get();
        $result['parentCategories'] = Category::where('status', '1')->where('parent_id', '0')->orderBy('id', 'ASC')->take(5)->get();
        return view('frontend.index', $result);
    }

    public function shop()
    {
        $parentCategories = Category::where('status', '1')->where('parent_id', '0')->get();
        return view('frontend.shop.category', compact('parentCategories'));
    }

    public function shopByCategory($category_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status', '1')->first();
        return view('frontend.shop.product', compact('category'));
    }

    public function trending()
    {
        $products = Product::where('trending', '1')->where('status', '1')->get();
        return view('frontend.shop.trending', compact('products'));
    }

    public function featured()
    {
        $products = Product::where('featured', '1')->where('status', '1')->get();
        return view('frontend.shop.featured', compact('products'));
    }

    public function ProductView($productSlug)
    {
        $result['product'] = Product::where('slug', $productSlug)->where('status', '1')->first();
        return view('frontend.shop.product_view', $result);
    }

    public function addToWishlist($productId)
    {
        if (Auth::check())
        {
            $check = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $productId)->exists();
            if ($check) {
                toast(__('message.Wishlist Exist'), 'error');
                return redirect()->back();
            } else {
                Wishlist::create([
                    'user_id'   => Auth::user()->id,
                    'product_id' => $productId,
                ]);
            }

            toast(__('message.Wishlist Add'),'success');
            return redirect()->back();
        }
    }

    public function wishlists()
    {
        $data = Wishlist::where('user_id', Auth::user()->id)->get();
        return view('frontend.wishlist.index', compact('data'));
    }

    public function wishlistRemove($id)
    {
        if (Auth::check()) {
            Wishlist::findOrFail($id)->delete();
            alert()->success(__('message.Wishlist Remove'));
            return redirect()->back();
        }
    }

    public function cart()
    {
        return view('frontend.cart.cart');
    }

    public function checkout()
    {
        if (Auth::user()->cart->count() == 0) {
            alert()->error(__('message.No product In Cart'));
            return redirect()->back();
        } else {
            return view('frontend.checkout.checkout');

        }
    }

    public function thankYou()
    {
        return view('frontend.thank_you');
    }

    public function orders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('frontend.orders.index', compact('orders'));
    }

    public function viewOrder($order_id)
    {
        $order = Order::where('id', $order_id)->first();
        $orderItems = OrderItems::where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('frontend.orders.view', compact('order', 'orderItems'));
    }
}
