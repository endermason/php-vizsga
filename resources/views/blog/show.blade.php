@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Vissza</a>
                <h1 class="display-one">{{ ucfirst($post->title) }}</h1>
                <p>{{ $post->bevezeto }}</p>
                <p>{!! $post->body !!}</p>
                <p>{{ $post->created_at }}</p>

                <hr>
                @if(Auth::user()->id == $post->user_id)
                <a href="/blog/{{ $post->id }}/edit" class="btn btn-outline-primary">Poszt szerkesztése</a>
                <br><br>

                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Poszt törlése</button>
                </form>
                @endif
                @auth

                    <a href="/comment/create/{{ $post->id }}" class="btn btn-primary btn-sm">Új komment</a>
                @endauth

                <h3>Kommentek</h3>
                @foreach($post->comments as $comment)
                    <div class="card mb-2">
                        <div class="card-body">
                            <p class="card-text">{{ $comment->body }}</p>
                            <p class="card-text"><small class="text-muted">Írta: {{ $comment->user->name }}</small></p>
                            <p class="card-text"><small class="text-muted">Dátum: {{ $comment->created_at }}</small></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
