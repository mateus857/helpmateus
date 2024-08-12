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
        return view('receitas.create');
    }

    // Método para salvar a receita
    public function store(Request $request)
    {
        // Remove o campo _token dos dados
        $data = $request->except('_token');

        // Cria uma nova instância do modelo Receita
        $receita = new Receita();

        // Atribui os dados do formulário ao modelo
        $receita->descricao = $data['descricao'];
        $receita->valor = $data['valor'];

        // Salva a receita
        $receita->save();

        // Redireciona de volta com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Receita cadastrada com sucesso!');
    }
}
