<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\StoreTrader;
use Illuminate\Support\Facades\Session;

class CartController extends Controller {

    public function showCart() {
        $userId = auth()->id(); // Ou outra lógica para determinar o usuário
        $cart = Cart::with('cartItems.product')->where('user_id', $userId)->first();

        if ($cart) {
            $subtotal = 0;
            foreach ($cart->cartItems as $item) {
                // Verificar se os produtos estão sendo carregados corretamente
                //dd($item, $item->product);
                $subtotal += $item->price * $item->quantity;
            }

            $discount = 0; // Calcule o desconto aqui, se aplicável
            $total = $subtotal - $discount;
        } else {
            $subtotal = 0;
            $total = 0;
            $cart = null; // Garantir que a variável $cart não está indefinida
        }

        return view('apps.cart.cart', compact('cart', 'subtotal', 'discount', 'total'));
    }

    public function addToCart(Request $request) {
        // Recupera o carrinho do banco de dados ou cria um novo se não existir
        $cart = Cart::firstOrCreate([
                    'user_id' => auth()->id()  // assume que o usuário está autenticado
        ]);

        // Encontra o produto que será adicionado ao carrinho
        $product = Product::find($request->id);
        if (!$product) {
            return response()->json(['message' => 'Produto não encontrado!'], 404);
        }

        // Verifica se o item já existe no carrinho
        $cartItem = $cart->cartItems()->where('product_id', $product->id)->first();
        if ($cartItem) {
            // Se o item já existe, incrementa a quantidade
            $cartItem->quantity += 1;
        } else {
            // Se não existe, cria um novo CartItem
            $cartItem = new CartItem([
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->preco  // Certifique-se que o nome da coluna de preço está correto
            ]);
            $cart->cartItems()->save($cartItem);
        }

        $cartItem->save();

        return response()->json(['message' => 'Produto adicionado ao carrinho com sucesso!']);
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
        $cart = Cart::with('cartItems.product')->where('user_id', auth()->id())->first();
        $cartItem = $cart->cartItems()->where('id', $id)->first();

        if ($cartItem) {
            $cartItem->quantity = $request->input('quantity');
            $cartItem->save();

            // Recalcule o subtotal e total do carrinho após a atualização
            $subtotal = 0;
            foreach ($cart->cartItems as $item) {
                $subtotal += $item->product->preco * $item->quantity;
            }
            $total = $subtotal; // Modificar se houver descontos ou outras taxas

            session(['subtotal' => $subtotal, 'total' => $total]);  // Atualiza as sessões

            return redirect()->route('view.cart')->with('success', 'Quantidade atualizada com sucesso!');
        }

        return back()->with('error', 'Item não encontrado.');
    }

    public function remove($id) {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('view.cart')->with('success', 'Item removido do carrinho com sucesso!');
    }

    public function applyCoupon(Request $request) {
        $couponCode = $request->input('coupon_code');
        $cart = Cart::with('cartItems.product')->where('user_id', auth()->id())->first();

        if (!$cart) {
            return redirect()->back()->with('error', 'Carrinho não encontrado!');
        }

        $discount = $this->calculateDiscount($couponCode, $cart);
        $subtotal = 0;

        foreach ($cart->cartItems as $item) {
            $subtotal += $item->price * $item->quantity;
        }

        $total = $subtotal - $discount;

        // Atualiza o carrinho com o novo total e subtotal se necessário
        Session::put('cart_discount', $discount);
        Session::put('cart_total', $total);

        return redirect()->route('view.cart')->with([
                    'success' => 'Cupom aplicado com sucesso!',
                    'subtotal' => $subtotal,
                    'total' => $total,
                    'discount' => $discount
        ]);
    }

    public function calculateDiscount($couponCode, $cart) {
        $coupon = Coupon::where('codigo', $couponCode)->first();

        if (!$coupon) {
            return 0;
        }

        $subtotal = 0;
        foreach ($cart->cartItems as $item) {
            $subtotal += $item->price * $item->quantity;
        }

        if ($coupon->discount_type === 'fixed') {
            return min($coupon->discount_value, $subtotal); // O desconto não pode exceder o subtotal
        } elseif ($coupon->discount_type === 'percent') {
            return ($subtotal * $coupon->discount_value) / 100;
        }

        return 0;
    }
}
