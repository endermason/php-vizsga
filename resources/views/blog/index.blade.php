@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Ez egy Blog!</h1>
                        <p>Itt találhatók a blogbejegyzések:</p>
                    </div>
                    @auth
                    <div class="col-4">
                        <p>Új poszt létrehozása</p>
                        <a href="/blog/create/post" class="btn btn-primary btn-sm">Új poszt</a>
                    </div>
                    @endauth
                </div>
                @forelse($posts as $post)
                    <ul>
                        <li>
                            <a href="./blog/{{ $post->id }}">{{ ucfirst($post->title) }}</a>
                            <p>{{ $post->bevezeto }}</p>
                            <p>{{ $post->created_at }}</p>
                            <p>{{ $post->user->name }}</p>
                        </li>
                    </ul>
                @empty
                    <p class="text-warning">Nincs jelenleg poszt.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
