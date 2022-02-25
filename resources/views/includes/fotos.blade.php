<section id="fotos" class="fotos">
    <h1>Álbuns de fotos</h1>
    <div class="albuns">
        @foreach($fotos as $foto)
        <div>
            <img src="{{ asset('/albuns/' . $foto['album'] . '/capa.jpg') }}" alt="capa do álbum">
            <div class="info">
                <h4>{{ $foto['titulo'] }}</h4>
                <span>{{ $foto['descricao'] }}</span>
            </div>
        </div>
        @endforeach
    </div>
</section>
