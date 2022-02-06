@extends('layouts.blank')

@section('content')
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
@endsection
