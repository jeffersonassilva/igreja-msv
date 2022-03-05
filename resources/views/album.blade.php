@extends('layouts.blank')

@section('content')
    <div class="fotografias">
    @foreach(File::glob(public_path('albuns/' . $album['pasta']).'/*') as $path)
        <div class="fotografia">
            <a href="{{ str_replace(public_path(), '', $path) }}" data-fancybox="gallery">
                <img src="{{ str_replace(public_path(), '', $path) }}">
            </a>
        </div>
    @endforeach
    </div>
@endsection
