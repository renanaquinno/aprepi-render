<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Doações</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #333; padding: 5px; text-align: left; }
        th { background-color: #f2f2f2; }
        .total { font-size: 16px; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Relatório de Doações</h2>

    <table>
        <thead>
            <tr>
                <th>Ord.</th>
                <th>Doador</th>
                <th>Data</th>
                <th>Valor</th>
                <th>Forma</th>
                <th>Status</th>
                <th>Observações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doacoes as $doacao)
                <tr>
			 <td>{{ $loop->iteration }}</td>
                    <td>{{ $doacao->user->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($doacao->data_doacao)->format('d/m/Y') }}</td>
                    <td>R$ {{ number_format($doacao->valor, 2, ',', '.') }}</td>
                    <td>{{ ucfirst($doacao->forma_pagamento) }}</td>
                    <td>{{ ucfirst($doacao->status) }}</td>
                    <td>{{ $doacao->observacoes ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="total">Total Arrecadado: R$ {{ number_format($total, 2, ',', '.') }}</p>
</body>
</html>
