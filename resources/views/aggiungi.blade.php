<!DOCTYPE html>
<html lang="it">
<head>
    @extends('layouts.home_header')
    <link rel="stylesheet" type="text/css" href="{{url('css/forms_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/home_header.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica Dipendente</title>
    <link rel="stylesheet" href="styles.css">
</head>
<header>
    @section('header')
    @endsection
</header>
<body>
<div class="container">
    <h1>Nuovo Dipendente</h1>
    <div class="form-container">
        <form id = "aggiunta" method="POST" action="{{ route('conferma')}}">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value={{old('nome')}}>
            </div>
            <div class="form-group">
                <label for="cognome">Cognome:</label>
                <input type="text" name="cognome" value={{old('cognome')}}>
            </div>
            <div class="form-group">
                <label for="ruolo">Ruolo:</label>
                <select name="ruolo">
                    <option name="ruolo" value = {{old('ruolo')}}></option>
                    @foreach($roles as $role)
                        <option name=ruoloeach>{{$role->ruolo}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="conferma" type="submit">Salva Modifiche</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
