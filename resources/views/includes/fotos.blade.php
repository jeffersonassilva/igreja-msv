<section id="fotos" class="fotos">
    <h1>Fotos</h1>
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
</section>
