@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Vissza</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Új komment létrehozása</h1>
                    <p>Töltsd ki</p>

                    <hr>

                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="control-group col-12 mt-2">
                                <label for="body">Komment szöveg</label>
                                <textarea id="body" class="form-control" name="body" placeholder="Írd be a komment szövegét"
                                          rows="" required></textarea>
                            </div>
                            <input type="text" id="post" name="post" value="{{$id}}" hidden>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Létrehoz!
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
