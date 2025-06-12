<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Conta configuração</title>

    /*CSS*/
    <link rel="stylesheet" href=""
</head>
<body>
    @extends('layouts.main')

@section('title', 'home')

@section('content')
<div class="dashboard">
  <aside class="sidebar">
    <div class="menu-toggle"><i class="fas fa-bars"></i></div>
    <nav>
      <ul>
        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i><span>Home</span></a></li>
        <li><a href="{{ route('historico') }}"><i class="fas fa-history"></i><span>Histórico</span></a></li>
        <li><a href="{{ route('configuracao') }}"><i class="fas fa-cog"></i><span>Configuração</span></a></li>
        <li><a href="{{ route('Dashboard') }}"><i class="fas fa-info-circle"></i><span>Dashboard</span></a></li>
        <li><a href="{{ route('saibamais') }}"><i class="fas fa-info-circle"></i><span>Saiba mais</span></a></li>
      </ul>

      <div class="logout">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" style="background: none; border: none; color: inherit; padding: 0; display: flex; align-items: center;">
            <i class="fas fa-sign-out-alt"></i>
            <span style="margin-left: 5px;">Sair</span>
          </button>
        </form>
      </div>
    </nav>
    
  </aside>
    
</body>
</html>