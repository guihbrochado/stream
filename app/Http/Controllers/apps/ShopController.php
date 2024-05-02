<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('apps.shop.index', compact('categories', 'products'));
    }

    public function productDetail($id)
    {
        $product = Product::with(['category', 'subcategory', 'reviews.user'])->findOrFail($id);
        $relatedProducts = Product::where('categoria_id', $product->categoria_id)
            ->where('id', '<>', $id) // Exclui o próprio produto
            ->take(10) // Vamos assumir que você quer 4 produtos relacionados
            ->get();

        return view('apps.shop.product-detail', compact('product', 'relatedProducts'));
    }

    public function whishlist()
    {
        return view('apps.shop.whishlist');
    }

    public function checkout()
    {
        return view('apps.shop.checkout');
    }

    public function detail()
    {
        return view('apps.shop.detail');
    }

    public function submitReview(Request $request, $productId)
    {
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

    public function edit($id)
    {
        $review = Review::findOrFail($id);

        // Verifica se o usuário autenticado é o autor do comentário
        if (auth()->id() !== $review->user_id) {
            return response()->json(['error' => 'Ação não permitida.'], 403);
        }

        return response()->json(['review' => $review], 200);
    }

    public function update(Request $request, $id)
    {
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


    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        // Verifica se o usuário autenticado é o autor do comentário
        if (auth()->id() !== $review->user_id) {
            return back()->with('error', 'Você não tem permissão para fazer isso.');
        }

        $review->delete();

        return back()->with('success', 'Comentário removido com sucesso.');
    }
}
