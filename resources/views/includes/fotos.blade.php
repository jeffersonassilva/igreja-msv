<section id="fotos" class="p-3 md:p-0 md:py-10 md:min-h-[600px] bg-neutral-100">
    <div class="container mx-auto">
        <h3 class="titulo-separador">Fotos</h3>
        <div class="albuns">
            @foreach($fotos as $foto)
            <a href="{{ route('album', ['pasta' => $foto['pasta']]) }}">
                <div>
                    <img src="{{ asset('/albuns/' . $foto['pasta'] . '/capa.jpg') }}" alt="capa do álbum">
                    <div class="info">
                        <h4>{{ $foto['titulo'] }}</h4>
                        <span>{{ $foto['descricao'] }}</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
