<!DOCTYPE html>
@extends('layouts.home_header')
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Il nostro Ufficio</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/dipendenti_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/home_header.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/interazioni_style.css')}}">
</head>
    @section('header')
    @endsection
<body>
<h1>I nostri dipendenti</h1>
<table>
    <thead>
        <th>Matricola</th>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Ruolo</th>
        <th>Stipendio</th>
        @if($user->is_admin) <th>Operazioni Admin</th> @else <th>Info</th @endif
    </thead>

    @if($workers->isEmpty())
        <p>Non ci sono lavoratori da mostrare.</p>
    @else
    <tbody>
    @foreach($workers as $worker)
    <tr>
        <td>{{$worker->matricola}}</td>
        <td>{{$worker->nome}}</td>
        <td>{{$worker->cognome}}</td>
        <td>{{$worker->ruolo}}</td>
        <td>{{$worker->stipendio_mensile}}</td>
        @if($user->is_admin)
        <td>
            <form id = "scelta" class = "auth_operation" method="POST" action="{{ route('delete', $worker->matricola) }}">
                @csrf
                <a class="modifica" href="{{ route('modifica' , $worker->matricola ) }}">Modifica</a>
                <button type="submit" class="elimina">Elimina</button>
            </form>
        </td>
        @else
            <td>
                <a class="visualizza" href="{{ route('visualizza' , $worker->matricola ) }}">visualizza</a>
            </td>
        @endif
    </tr>
    @endforeach
    </tbody>
    @endif
</table>
@if($user->is_admin)
<div class="center">
    <a href={{ route('aggiungi')}} class="button">Aggiungi Dipendente</a>
    @endif
</div>
</body>
<script>

</script>
</html>
