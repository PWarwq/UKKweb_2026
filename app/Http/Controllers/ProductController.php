<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\Process\Messenger\RunProcessContext;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private function getProducts()
    {
        $path = public_path('data/products.json');
        
        if (! file_exists($path)) {
            return collect();
        }
        
        $json = file_get_contents($path);
        $products = json_decode($json);

        return collect($products);
    }

    public function index(Request $request)
    {

        $products = $this->getProducts();

        return view('pages.index',[
            'products'=> $products
        ]);
    }



    public function addToCart($kode)
    {
        $product = $this->getProducts()->firstWhere('kode', (int) $kode);

        if (!$product) {
            abort(404);
        }

        $cart = session('cart', []);

        if (isset($cart[$kode])) {
            $cart[$kode]['quantity']++;
        } else {
            $cart[$kode] = [
                'product' => $product,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    public function cart()
    {
        $products = $this->getProducts();
        $cart = session('cart', []);

        return view('pages.cart', compact('cart'));
    }

    public function remove($kode)
    {
        $cart = session('cart', []);

        unset($cart[$kode]);

        session(['cart' => $cart]);

        return redirect()->route('cart');
    }

    public function clearCart()
    {
        session()->forget('cart');

        return redirect()->route('cart');
    }


}
