<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\StoreTrader;
use Illuminate\Support\Facades\Session;

class CartController extends Controller {

    public function showCart() {
        $cart = Cart::with('cartItems.storeTrader')->where('user_id', auth()->id())->first();
        $total = array_sum(array_map(function ($item) {
                    return $item['price'] * $item['quantity'];
                }, $cart));
        return view('apps.cart.cart', compact('cart', 'total'));
    }

    public function addToCart($id) {
        $trader = StoreTrader::find($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $company = $trader->storeCompany;

            $cart[$id] = [
                "store_company_id" => $company->id,
                "company" => $company ? $company->company : "Company Name",
                "trader" => $trader->trader,
                "price" => $trader->price,
                "image_path" => $trader->trader_image_path,
                "quantity" => 1
            ];
        }
        session()->put('cart', $cart);
        \Log::info('Carrinho:', session()->get('cart'));

        session()->flash('success', 'Adicionado ao carrinho com sucesso.');

        return redirect()->back()->with('success', 'Trader adcionado ao carrinho com sucesso!');
    }

    public function viewCart() {
        $cart = session()->get('cart', []);

        $subtotal = array_sum(array_map(function ($item) {
                    return $item['price'] * $item['quantity'];
                }, $cart));

        $discount = 78; // ou qualquer lógica para calcular o desconto
        $total = $subtotal - $discount;
        //dd($cart);

        return view('apps.cart.cart', compact('cart', 'subtotal', 'discount', 'total'));
    }

    public function update(Request $request, $id) {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('view.cart')->with('success', 'Quantidade atualizada com sucesso!');
    }

    public function remove($id) {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('view.cart')->with('success', 'Item removido do carrinho com sucesso!');
    }
}
