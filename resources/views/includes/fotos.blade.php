<section id="fotos" class="p-3 md:p-0 md:py-10 bg-neutral-100">
    <div class="container mx-auto max-w-[1280px]">
        <h1 class="titulo-separador">Fotos</h1>
        <div class="grid grid-cols-2 gap-2 md:grid-cols-4 md:p-3 lg:px-12">
            @foreach($fotos as $foto)
            <a href="{{ route('album', ['pasta' => $foto['pasta']]) }}">
                <div class="bg-white border border-2 border-gray-100">
                    <img class="w-full" src="{{ asset('/albuns/' . $foto['pasta'] . '/capa.jpg') }}" alt="capa do álbum">
                    <div class="p-2">
                        <h2 class="text-sm pb-1">{{ $foto['titulo'] }}</h2>
                        <p class="text-xs font-thin">{{ $foto['descricao'] }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
