<section id="propositos" class="p-3 md:p-0 md:py-10 md:min-h-[550px]">
    <div class="container mx-auto max-w-[1280px]">
        <h2 class="titulo-separador">Propósitos</h2>
        <div class="grid p-3 gap-6 lg:grid-cols-3 lg:px-6">
            @foreach($propositos as $proposito)
            <div class="flex flex-col items-center w-full bg-neutral-100 rounded-lg p-6 lg:p-8">
                <div class="flex-none text-[#e6cc7b] text-2xl sm:text-3xl">
                    <ion-icon name="locate-outline"></ion-icon>
                </div>
                <h3 class="pb-3 md:pb-6 sm:text-lg">{{ $proposito->titulo }}</h3>
                <div class="font-light text-sm text-center sm:text-base">
                    {{ $proposito->descricao }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
