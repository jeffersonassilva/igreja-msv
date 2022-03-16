<section id="pastores" class="p-3 md:p-0 md:py-10 bg-neutral-100">
    <div class="container mx-auto max-w-[1280px]">
        <h3 class="titulo-separador">Pastores</h3>
        <div class="flex flex-col flex-wrap md:flex-row p-3 lg:py-10 lg:px-20">
            <div class="md:flex-[50%] md:flex-1 flex md:justify-end md:mx-3 bg-gray-200">
                <picture class="w-full">
                    <source type="image/webp" media="(min-width:640px)" srcset="{{ asset('img/pastores-large.webp') }}">
                    <source type="image/jpeg" media="(min-width:640px)" srcset="{{ asset('img/pastores-large.jpg') }}">
                    <source type="image/webp" media="(min-width:480px)" srcset="{{ asset('img/pastores-medium.webp') }}">
                    <source type="image/jpeg" media="(min-width:480px)" srcset="{{ asset('img/pastores-medium.jpg') }}">
                    <source type="image/webp" media="(max-width:479px)" srcset="{{ asset('img/pastores-small.webp') }}">
                    <img loading="lazy" width="720" height="480" src="{{ asset('img/pastores-small.jpg') }}" alt="Samuel e Hacsa" title="Samuel e Hacsa">
                </picture>
            </div>
            <div class="md:flex-[50%] md:flex-1">
                <div class="text-lg lg:text-2xl font-medium my-6 md:mx-3 lg:my-0 lg:mx-6 2xl:mx-10 text-neutral-700">SAMUEL e HACSA NOVAIS</div>
                <div class="font-light text-sm lg:text-base 2xl:text-xl leading-6 lg:leading-7 2xl:leading-9 mb-6 md:mx-3 lg:m-6 2xl:m-10">
                    O Ministério Semeando a Verdade foi um projeto que Deus colocou em nossos corações.
                    Cremos que o Senhor nos deu entendimento a respeito dos nossos ministérios, e nos direcionou para realizar
                    aquilo que nos foi confiado.
                </div>
            </div>
        </div>
    </div>
</section>