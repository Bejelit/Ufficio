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
    <h1>Dipendente</h1>
    <div class="form-container">
        <form id = "modifica" >
            <div class="form-group">
                <label for="matricola">Matricola:</label>
                <input type="text" name="matricola" value="{{ $worker->matricola }}" disabled>
            </div>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="{{ $worker->nome }}" disabled>
            </div>
            <div class="form-group">
                <label for="cognome">Cognome:</label>
                <input type="text" name="cognome" value="{{ $worker->cognome }}" disabled>
            </div>
            <div class="form-group">
                <label for="ruolo">Ruolo:</label>
                <input type="text" name="ruolo" value="{{ $worker->ruolo }}" disabled>
            </div>
            <div class="form-group">
                <label for="stipendio">Stipendio:</label>
                <input type="text" name="stipendio" value="{{ $worker->stipendio_mensile }}" disabled>
            </div>
        </form>
    </div>
</div>
</body>
</html>
