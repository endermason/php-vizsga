@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one mt-5">{{ config('app.name') }}</h1>
                <p>Ebben a blogban bejegyzések találhatók.</p>
                <br>
                <a href="/blog" class="btn btn-outline-primary">Blog</a>
            </div>
        </div>
    </div>
    <div>
        <li class="nav-item">
            <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('login') }}">Belépés</a></li>
        <li class="nav-item">
            <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('register') }}">Regisztráció</a>
        </li>
    </div>
@endsection
