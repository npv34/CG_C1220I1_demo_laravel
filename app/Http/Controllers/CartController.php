<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function addToCart($id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::find($id);
        $oldCart = session()->get('cart');
        $newCart = new Cart($oldCart);
        $newCart->addProduct($product);
        session()->put('cart', $newCart);
        return back();
    }

    function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $cart = session()->get('cart');
        return view('front-end.cart.index', compact('cart'));
    }

    function removeProduct($id): \Illuminate\Http\RedirectResponse
    {
        $oldCart = session()->get('cart');
        $newCart = new Cart($oldCart);
        $newCart->deleteProduct($id);
        session()->put('cart', $newCart);
        return back();
    }
}
