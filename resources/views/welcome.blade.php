@extends('layouts.app')
@section('content')
<style>
    main{
        width: 100vw;
        height: 100vh;
        background-color: #21262C;
    }
    img{
        max-width: 450px;
        filter: invert(1);
    }
</style>
<main>
    <div class="container">
        <h1 class="text-white text-center py-3">BENVENUTO DEL MIO GITHUB</h1>
        <strong class="text-white d-block text-center mb-5  ">Registrati per vedere i miei primi progetti da Sviluppatore web</strong>
        <div class="d-flex align-items-center justify-content-center">
            <img src="https://logos-world.net/wp-content/uploads/2020/11/GitHub-Logo.png" alt="img_Home">
        </div>
        <div class="d-flex gap-4 justify-content-center py-5">
           <a class=" btn btn-danger" href="{{ route('login') }}">{{ __('Login') }}</a>
           <a class=" btn btn-primary" href="{{ route('register') }}">{{ __('Registrati') }}</a>
        </div>

        <div class="text-center text-white">
            <p>Rimani aggiornato iscrivendoti alla newsletter!!</p>
            <strong>© created by Orlando/Development/2024/laravel</strong>

        </div>
    </div>
</main>
@endsection