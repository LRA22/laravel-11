<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            margin-top: 20px;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .success-message {
            color: green;
            margin-top: 20px;
        }
        .back-button {
            background-color: #007bff; /* Azul padrão */
            margin-bottom: 20px;
        }
        .back-button:hover {
            background-color: #0056b3; /* Azul mais escuro ao passar o mouse */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Cadastrar Produto</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <!-- Botão de Voltar -->
    <a href="{{ route('dashboard') }}">
        <button class="back-button">Voltar para o Dashboard</button>
    </a>

    <form action="{{ route('produto.store') }}" method="POST">
        @csrf
        <label for="name">Nome do Produto:</label>
        <input type="text" name="name" id="name" required>

        <label for="preco">Preço:</label>
        <input type="number" step="0.01" name="preco" id="preco" required>

        <label for="descricao">Descrição (opcional):</label>
        <textarea name="descricao" id="descricao"></textarea>

        <button type="submit">Cadastrar Produto</button>
    </form>

    <h2>Lista de Produtos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->name }}</td>
                    <td>{{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td>{{ $produto->descricao }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
