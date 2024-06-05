<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class ShopController extends Controller {

    public function index() {
        $categories = Category::all();
        $products = Product::all();
        return view('apps.shop.index', compact('categories', 'products'));
    }

    public function productDetail($id) {
        $product = Product::with(['category', 'subcategory', 'reviews.user'])->findOrFail($id);
        $relatedProducts = Product::where('categoria_id', $product->categoria_id)
                ->where('id', '<>', $id) // Exclui o próprio produto
                ->take(10) // Vamos assumir que você quer 10 produtos relacionados
                ->get();

        // Obtém a avaliação do usuário autenticado para este produto
        $review = auth()->check() ? Review::where('user_id', auth()->id())->where('product_id', $id)->first() : null;

        return view('apps.shop.product-detail', compact('product', 'relatedProducts', 'review'));
    }

    public function wishlist() {
        $user = auth()->user();
        $wishlistItems = Wishlist::with('product')
                ->where('user_id', $user->id)
                ->get();
        return view('apps.shop.wishlist', compact('wishlistItems'));
    }

    // Adiciona um produto à lista de desejos
    public function addToWishlist(Request $request) {
        // Modificar a validação para a tabela correta
        $request->validate(['product_id' => 'required|exists:produtos,id']);

        $user = auth()->user();
        Wishlist::firstOrCreate([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
        ]);

        return back()->with('success', 'Produto adicionado à lista de desejos.');
    }

    // Remove um produto da lista de desejos
    public function removeFromWishlist($id) {
        $wishlistItem = Wishlist::where('user_id', auth()->id())
                ->where('id', $id)
                ->firstOrFail();

        $wishlistItem->delete();
        return back()->with('success', 'Produto removido da lista de desejos.');
    }

    public function checkout() {
        $user = auth()->user();
        $cart = Cart::with(['cartItems.product'])->where('user_id', $user->id)->first();

        if (!$cart) {
            return redirect()->route('show.cart')->with('error', 'Seu carrinho está vazio.');
        }

        $address = $user->address;

        $subtotal = 0;
        foreach ($cart->cartItems as $item) {
            $subtotal += $item->price * $item->quantity;
        }

        $total = $subtotal;

        return view('apps.shop.checkout', compact('user', 'address', 'cart', 'subtotal', 'total'));
    }

    public function detail() {
        return view('apps.shop.detail');
    }

    public function submitReview(Request $request, $productId) {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        Review::create([
            'product_id' => $productId,
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Review submitted successfully.');
    }

    public function edit($id) {
        $review = Review::findOrFail($id);

        // Verifica se o usuário autenticado é o autor do comentário
        if (auth()->id() !== $review->user_id) {
            return response()->json(['error' => 'Ação não permitida.'], 403);
        }

        return response()->json(['review' => $review], 200);
    }

    public function update(Request $request, $id) {
        $review = Review::findOrFail($id);

        // Verifica se o usuário autenticado é o autor do comentário
        if (auth()->id() !== $review->user_id) {
            return back()->with('error', 'Você não tem permissão para fazer isso.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Avaliação atualizada com sucesso.');
    }

    public function destroy($id) {
        $review = Review::findOrFail($id);

        // Verifica se o usuário autenticado é o autor do comentário
        if (auth()->id() !== $review->user_id) {
            return back()->with('error', 'Você não tem permissão para fazer isso.');
        }

        $review->delete();

        return back()->with('success', 'Comentário removido com sucesso.');
    }
}
