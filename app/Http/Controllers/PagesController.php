<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;


class PagesController extends Controller
{
    public function index()
    {
        
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $products = Product::paginate(16);
        return view('frontend.pages.index', compact('subcategories', 'categories', 'products'));
    }

    public function shop()
    {
        return view('frontend.pages.shop');
    }

    public function cart()
    {
        return view('frontend.pages.cart');
    }
    public function about()
    {
        return view('frontend.pages.about');
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    public function watchlist()
    {
        return view('frontend.pages.watchlist');
    }

    public function myaccount()
    {
        return view('frontend.pages.myaccount');
    }
    public function orders()
    {
        return view('frontend.pages.orders');
    }
    public function orders_details()
    {
        return view('frontend.pages.orders_details');
    }
    public function addresses()
    {
        return view('frontend.pages.addresses');
    }

    public function add_address()
    {
        return view('frontend.pages.add_address');
    }
    public function checkout()
    {
        return view('frontend.pages.checkout');
    }
    public function confirmation_order()
    {
        return view('frontend.pages.confirmation_order');
    }
    public function admin_dash()
    {
        return view('backend.pages.admin_dash');
    }

    public function account_details()
    {
        return view('frontend.pages.account_details');
    }
    public function admin_login()
    {
        return view('backend.admin_auth.admin_login');
    }
    public function dashboard()
    {
        return view('backend.pages.dashboard');
    }
    public function category()
    {
        return view('backend.pages.category.index');
    }
    public function add_category()
    {
        return view('backend.pages.category.add_category');
    }
    public function products()
    {
        return view('backend.pages.products.index');
    }
    /*  public function add_products()
    {
        return view('backend.pages.products.add_products');
    } */
    public function backend_orders()
    {
        return view('backend.pages.orders.index');
    }
    public function order_traking()
    {
        return view('backend.pages.orders.order_traking');
    }
    public function coupons()
    {
        return view('backend.pages.coupons.coupons');
    }
    public function users()
    {
        return view('backend.pages.users.users');
    }
    public function admin_settings()
    {
        return view('backend.pages.admin_settings.admin_settings');
    }
    public function product_details()
    {
        return view('frontend.pages.product_details');
    }
}
