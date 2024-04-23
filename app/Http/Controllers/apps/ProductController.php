<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::select('id', 'nome', 'preco', 'quantidade')->get();
        return view('apps.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('apps.product.form', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'preco' => 'required|numeric',
            'descricao' => 'nullable|max:65535',
            'quantidade' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'subcategoria_id' => 'required|exists:subcategorias,id',
            'informacoes_adicionais' => 'nullable|max:65535',
            'comentarios' => 'nullable|max:65535',
            'imagem' => 'nullable|image|max:2048', // 2MB Max
        ]);

        try {
            $path = null;
            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
                $filename = time() . '_' . $request->imagem->getClientOriginalName(); // Nome do arquivo baseado no tempo atual e nome original do arquivo
                $path = $request->imagem->move(public_path('assets/images/product'), $filename); // Mover o arquivo para o diretório público
                $path = str_replace(public_path(), '', $path); // Salva o caminho relativo no banco de dados
            }

            $product = Product::create([
                'nome' => $request->nome,
                'preco' => $request->preco,
                'descricao' => $request->descricao,
                'quantidade' => $request->quantidade,
                'categoria_id' => $request->categoria_id,
                'subcategoria_id' => $request->subcategoria_id,
                'informacoes_adicionais' => $request->informacoes_adicionais,
                'comentarios' => $request->comentarios,
                'imagem' => $path,
            ]);
        } catch (Exception $e) {
            return redirect()->route('product.index')->with('error', $e->getMessage());
        }
        return redirect()->route('product.index')->with('success', "Produto '{$product->nome}' criado com sucesso.");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::with(['category', 'subcategory'])->findOrFail($id);
        return view('apps.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subcategories = Subcategory::where('categoria_id', $product->categoria_id)->get();
        return view('apps.product.form', compact('product', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'preco' => 'required|numeric',
            'descricao' => 'nullable|max:65535',
            'quantidade' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'subcategoria_id' => 'required|exists:subcategorias,id',
            'informacoes_adicionais' => 'nullable|max:65535',
            'comentarios' => 'nullable|max:65535',
            'imagem' => 'nullable|image|max:2048', // 2MB
        ]);

        try {
            $product = Product::findOrFail($id);

            // Lógica para atualizar a imagem, se uma nova foi fornecida
            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
                // Exclui a imagem antiga se existir e não é uma URL de armazenamento externo
                $path = null;
                if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
                    $filename = time() . '_' . $request->imagem->getClientOriginalName(); // Nome do arquivo baseado no tempo atual e nome original do arquivo
                    $path = $request->imagem->move(public_path('assets/images/product'), $filename); // Mover o arquivo para o diretório público
                    $path = str_replace(public_path(), '', $path); // Salva o caminho relativo no banco de dados
                }

                $path = $request->imagem->store('images', 'public');
                $product->imagem = $path;
            }

            $product->nome = $request->nome;
            $product->preco = $request->preco;
            $product->descricao = $request->descricao;
            $product->quantidade = $request->quantidade;
            $product->categoria_id = $request->categoria_id;
            $product->subcategoria_id = $request->subcategoria_id;
            $product->informacoes_adicionais = $request->informacoes_adicionais;
            $product->comentarios = $request->comentarios;

            $product->save();

            return redirect()->route('product.index')->with('success', "Produto '{$product->nome}' atualizado com sucesso.");
        } catch (Exception $e) {
            return redirect()->route('product.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
        } catch (Exception $e) {
            return redirect()->route('product.index')->with('error', $e->getMessage());
        }
        return redirect()->route('product.index')->with('success', 'Produto removido com sucesso.');
    }
}
