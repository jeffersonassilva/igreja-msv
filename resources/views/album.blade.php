@extends('layouts.default')

@section('content')
    <section class="p-3 md:p-0 md:py-10">
        <div class="container mx-auto max-w-[1280px]">
            <h3 class="titulo-separador">{{ $album['titulo'] }}</h3>
            <div class="grid grid-cols-2 gap-3 md:p-4 md:gap-4 md:grid-cols-3 lg:grid-cols-4">
                @foreach(File::glob(public_path('albuns/' . $album['pasta']).'/*') as $path)
                    @if(!strpos(str_replace(public_path(), '', $path), 'capa'))
                        <a href="{{ str_replace(public_path(), '', $path) }}" data-fancybox="gallery">
                            <img src="{{ str_replace(public_path(), '', $path) }}">
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
