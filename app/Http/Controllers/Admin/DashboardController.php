<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin\Brand;
use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Frontend\Order;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $result['t_orders'] = Order::count();
        $result['d_orders'] = Order::whereDate('created_at', Carbon::today())->count();
        $result['m_orders'] = Order::whereMonth('created_at', Carbon::now()->format('m'))->count();
        $result['y_orders'] = Order::whereYear('created_at', Carbon::now()->format('Y'))->count();
        $result['t_products'] = Product::count();
        $result['t_categories'] = Category::count();
        $result['t_brands'] = Brand::count();
        $result['t_banners'] = Banner::count();

        $result['users'] = User::where('role', 'user')->orderBy('id', 'DESC')->get();
        $result['admins'] = User::where('role', 'admin')->orderBy('id', 'ASC')->get();

        return view('admin.index', $result);
    }
}
