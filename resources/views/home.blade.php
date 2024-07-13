<!DOCTYPE html>
@extends('layouts.home_header')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <head> <link rel="stylesheet" type="text/css" href="{{url('css/home_style.css')}}"> </head>
    <head> <link rel="stylesheet" type="text/css" href="{{url('css/home_header.css')}}"> </head>
    <title>Ufficio</title>
</head>
    @section('header')
    @endsection
<body>

<div class="center">
    <h1>Benvenuto nel nostro ufficio!</h1>
    <a class="Bottone" href=" {{route('check')}}"> Scopri i dipendenti ></a>
    @if(session('error'))
        <div class ="mess-errore">
        {{session('error')}}
        </div>
    @endif
</div>
<body>

