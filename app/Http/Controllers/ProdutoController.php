<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Produto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use Illuminate\View\View;

class ProdutoController extends Controller

    {
        // Exibe o formulário de cadastro de produto
        public function create()
        {
            $produtos = Produto::all(); // Busca todos os produtos
            return view('produto', compact('produtos')); // Passa os produtos para a view
        }
    
        // Processa o cadastro do produto
        public function store(Request $request)
        {
           
            // Validação dos dados
            $request->validate([
                'name' => 'required|max:255',
                'preco' => 'required|numeric',
                'descricao' => 'nullable',
            ]);
    
            // Cria um novo produto
            Produto::create([
                'name' => $request->input('name'),
                'preco' => $request->input('preco'),
                'descricao' => $request->input('descricao'),
            ]);
    
            // Redireciona para uma página de sucesso ou lista de produtos
            return Redirect::route('produto.create')->with('success', 'Produto cadastrado com sucesso!');
        }
    }

