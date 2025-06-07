<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Eventos</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 5px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Relatório de Eventos</h2>
    <table>
        <thead>
            <tr>
                <th>Ord.</th>
                <th>Título</th>
                <th>Data/Hora</th>
                <th>Local</th>
                <th>Recorrente</th>
                <th>Custo</th>
                <th>Arrecadação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventos as $evento)
                <tr>
			<td>{{ $loop->iteration }}</td>
			<td>{{ $evento->titulo }}</td>
			<td>{{ \Carbon\Carbon::parse($evento->data_hora)->format('d/m/Y H:i') }}</td>
			<td>{{ $evento->local }}</td>
			<td>{{ $evento->recorrente ? 'Sim' : 'Não' }}</td>
			<td>R$ {{ number_format($evento->valor_custo, 2, ',', '.') }}</td>
			<td>R$ {{ number_format($evento->valor_arrecadado, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
