<?php

// app/Http/Controllers/ReceitaController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receita;

class ReceitaController extends Controller
{
    // Método para exibir as receitas
    public function index()
    {
        // Busca todas as receitas do banco de dados
        $receitas = Receita::all();

        // Calcula o total das receitas
        $totalReceitas = $receitas->sum('valor');

        // Retorna a view com as receitas e o total
        return view('receitas.index', compact('receitas', 'totalReceitas'));
    }

    // Método para exibir o formulário de cadastro de receitas
    public function create()
    {
        return view('receitas.index');
    }

    // Método para salvar a receita
    public function store(Request $request)
    {
        // Valida os dados de entrada
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'categoria' => 'required|string|max:255',
            'valor' => 'required|numeric',
        ]);

        try {
            // Cria uma nova instância de Receita e salva no banco de dados
            $receita = Receita::create($validatedData);

            // Redireciona para a página de listagem com uma mensagem de sucesso
            return redirect()->route('receitas.index')->with('success', 'Receita criada com sucesso!');
        } catch (\Exception $e) {
            // Se ocorrer um erro, redireciona de volta com uma mensagem de erro
            return redirect()->route('receitas.index')->with('error', 'Ocorreu um erro ao criar a receita.');
        }
    }

}
