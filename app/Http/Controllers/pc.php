    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'data_hora' => 'required|date',
            'local' => 'required|string',
            'valor_custo' => 'required|numeric',
            'valor_arrecadado' => 'nullable|numeric',
            'recorrente' => 'boolean',
            'descricao' => 'nullable|string',
            'participantes' => 'nullable|array',
        ]);

        $evento = Evento::create($request->except('participantes'));

        if ($request->has('participantes')) {
            $evento->participantes()->sync($request->participantes);

            // Loga os participantes adicionados
            activity()
                ->performedOn($evento)
                ->causedBy(auth()->user())
                ->withProperties([
                    'participantes_adicionados' => User::whereIn('id', $request->participantes)->pluck('name'),
                ])
                ->log('Participantes adicionados');
        }

        return redirect()->route('eventos.index')->with('success', 'Evento cadastrado com sucesso!');
    }
