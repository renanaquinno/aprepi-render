<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Cestas Básicas</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 5px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Relatório de Cestas Básicas</h2>
    <table>
        <thead>
            <tr>
                <th>Ord.</th>
                <th>Data Recebimento</th>
                <th>Entrada</th>
                <th>Origem</th>
                <th>Status</th>
                <th>Data Entrega</th>
                <th>Destinatário</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cestas as $cesta)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($cesta->data_recebimento)->format('d/m/Y') }}</td>
                    <td>{{ ucfirst($cesta->entrada_tipo) }}</td>
                    <td>{{ $cesta->origemPessoa->name ?? '-' }}</td>
                    <td>{{ ucfirst($cesta->status) }}</td>
                    <td>{{ $cesta->data_entrega ? \Carbon\Carbon::parse($cesta->data_entrega)->format('d/m/Y') : '-' }}</td>
                    <td>{{ $cesta->usuarios->name ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
