<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        if ($request->filled('tipo_usuario')) {
            $query->where('tipo_usuario', $request->input('tipo_usuario'));
        }

        $usuarios = $query->orderBy('name')->paginate(10);

        return view('usuarios.index', compact('usuarios'));
    }


    public function create()
    {
        return view('usuarios.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'cpf' => 'required|unique:users,cpf',
            'password' => 'required|min:6',
            'tipo_usuario' => 'required|in:admin,voluntario,socio,doador',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'password' => Hash::make($request->password),
            'tipo_usuario' => $request->tipo_usuario,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit(User $user)
    {
        return view('usuarios.form', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'cpf' => 'required|unique:users,cpf,' . $user->id,
            'tipo_usuario' => 'required|in:admin,voluntario,socio,doador',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'tipo_usuario' => $request->tipo_usuario,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }

    public function show(User $user)
    {
        return view('usuarios.show', compact('user'));
    }

    public function gerarRelatorioPDF(Request $request)
    {
        $query = User::query();
        if ($request->filled('tipo_usuario')) {
            $query->where('tipo_usuario', $request->tipo_usuario);
        }
        if ($request->filled('nome')) {
            $query->where('name', 'like', '%' . $request->nome . '%');
        }

        $usuarios = $query->get();

        $pdf = Pdf::loadView('usuarios.relatorio-pdf', compact('usuarios'));

        return $pdf->download('relatorio_usuarios.pdf');
    }


}
