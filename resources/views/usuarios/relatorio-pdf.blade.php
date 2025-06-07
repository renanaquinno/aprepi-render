<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Usuários</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 5px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Relatório de Usuários</h2>
    <table>
        <thead>
            <tr>
                <th>Ord.</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Tipo de Usuário</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
			<td>{{ $loop->iteration }}</td>
			<td>{{ $usuario->name }}</td>
			<td>{{ $usuario->cpf }}</td>
			<td>{{ $usuario->email }}</td>
			<td>{{ $usuario->telefone }}</td>
			<td>{{ ucfirst($usuario->tipo_usuario) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
