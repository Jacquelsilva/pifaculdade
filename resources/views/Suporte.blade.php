@extends('layouts.main')

@section('title', 'Suporte')

@section('content')

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Suporte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Perguntas Frequentes</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Como faço para criar uma conta?</h5>
            <p class="card-text">Você pode criar uma conta clicando no botão "Cadastro" no menu superior e preenchendo o formulário.</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Como alterar minhas preferências de idioma?</h5>
            <p class="card-text">Acesse a seção "Configurações" e depois "Preferências" para alterar o idioma do aplicativo.</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Como entrar em contato com o suporte?</h5>
            <p class="card-text">Envie um email para <a href="mailto:suporte@exemplo.com">suporterecora@gmail.com</a></p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection