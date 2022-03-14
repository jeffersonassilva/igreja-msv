@extends('layouts.default')

@section('content')
    <style type="text/css">
        .main {
            justify-content: inherit;
            align-items: inherit;
        }
    </style>
    <section class="album">
        <h1>{{ $album['titulo'] }}</h1>
        <div class="fotografias">
            @foreach(File::glob(public_path('albuns/' . $album['pasta']).'/*') as $path)
                @if(!strpos(str_replace(public_path(), '', $path), 'capa'))
                    <div class="fotografia">
                        <a href="{{ str_replace(public_path(), '', $path) }}" data-fancybox="gallery">
                            <img src="{{ str_replace(public_path(), '', $path) }}">
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endsection
