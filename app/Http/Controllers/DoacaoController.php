<?php
namespace App\Http\Controllers;

use App\Models\Doacao;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DoacaoController extends Controller
{
    public function index(Request $request)
    {
        $query = Doacao::query()->with('user');

        // Filtros
        if ($request->filled('data_inicio')) {
            $query->where('data_doacao', '>=', $request->data_inicio);
        }
        if ($request->filled('data_fim')) {
            $query->where('data_doacao', '<=', $request->data_fim);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Clona antes da paginação
        $totalQuery = (clone $query);
        $total = $totalQuery->sum('valor'); // Correto agora

        $doacoes = $query->paginate(10)->withQueryString(); // Paginação preservando filtros

        $usuarios = User::all();

        return view('doacoes.index', compact('doacoes', 'total', 'usuarios'));

    }

    public function create()
    {
        $usuarios = User::all();
        return view('doacoes.form', compact('usuarios'));
    }

    public function edit(Doacao $doacao)
    {
        $usuarios = User::all();
        return view('doacoes.form', compact('doacao', 'usuarios'));
    }

     public function show(Doacao $doacao)
    {
        return view('doacoes.show', compact('doacao'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'data_doacao' => 'required|date',
            'valor' => 'required|numeric',
            'forma_pagamento' => 'required',
            'observacoes' => 'nullable',
            'status' => 'required|in:realizada,pendente,cancelada'
        ]);


        Doacao::create($request->all());

        return redirect()->route('doacoes.index')->with('success', 'Doação cadastrada com sucesso!');
    }

    public function update(Request $request, Doacao $doacao)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'data_doacao' => 'required|date',
            'valor' => 'required|numeric',
            'forma_pagamento' => 'required',
            'observacoes' => 'nullable', 
            'status' => 'required|in:realizada,pendente,cancelada',
        ]);

        $doacao->update($request->only([
            'user_id',
            'data_doacao',
            'valor',
            'forma_pagamento',
            'observacoes', 
            'status',
        ]));

        return redirect()->route('doacoes.index')->with('success', 'Doação atualizada com sucesso!');
    }

    public function destroy(Doacao $doacao)
    {
        $doacao->delete();
        return redirect()->route('doacoes.index')->with('success', 'Doação excluída com sucesso!');
    }


    public function gerarRelatorioPDF(Request $request)
    {
        // Consulta com filtros
        $query = Doacao::with('user');

        if ($request->filled('data_inicio')) {
            $query->whereDate('data_doacao', '>=', $request->data_inicio);
        }
        if ($request->filled('data_fim')) {
            $query->whereDate('data_doacao', '<=', $request->data_fim);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $doacoes = $query->get();
        $total = $doacoes->sum('valor');

        // Gera PDF com base na view
        $pdf = Pdf::loadView('doacoes.relatorio-pdf', compact('doacoes', 'total'));

        return $pdf->download('relatorio_doacoes.pdf');
    }
    

}
