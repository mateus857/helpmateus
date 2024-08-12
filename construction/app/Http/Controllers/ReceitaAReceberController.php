<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReceitaAReceber;

class ReceitaAReceberController extends Controller
{
    public function index()
    {
        $receitasAReceber = ReceitaAReceber::all();
        $totalReceitasAReceber = ReceitaAReceber::sum('valor');
        return view('receitas-a-receber.index', [
            'receitasAReceber' => $receitasAReceber,
            'totalReceitasAReceber' => $totalReceitasAReceber,
        ]);
    }

    public function create()
    {
        return view('receitas-a-receber.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required',
            'valor' => 'required|numeric|min:0',
        ]);

        ReceitaAReceber::create([
            'descricao' => $request->descricao,
            'valor' => $request->valor,
        ]);

        return redirect()->route('receitas-a-receber.index')->with('success', 'Receita a Receber cadastrada com sucesso!');
    }
}
