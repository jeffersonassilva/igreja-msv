<header class="flex justify-between items-center p-3 md:p-4 lg:p-6 lg:pl-10">
    <a href="{{ route('index') }}"
       class="outline-0 border border-transparent hover:opacity-70
       focus:opacity-70 focus:border focus:border-dashed focus:border-gray-400">
        <img src="{{ asset('/img/logo-branca.png') }}" alt="logo" class="w-[70px] sm:w-[90px] md:w-[110px]">
    </a>
    <div class="toggle lg:hidden"></div>
    <ul class="navigation hidden lg:flex overflow-y-auto">
        <li class="link text-white"><a accesskey="h" href="{{ route('index') }}">Home</a></li>
        <li class="link text-white"><a accesskey="p" href="/#propositos">Propósitos</a></li>
        <li class="link text-white"><a accesskey="s" href="/#pastores">Pastores</a></li>
        <li class="link text-white"><a accesskey="g" href="/#programacao">Programação</a></li>
        <li class="link text-white"><a accesskey="o" href="{{ route('ofertas') }}">Ofertas</a></li>
        <li class="link text-white hidden lg:block">
            <a accesskey="d"
               href="https://linktr.ee/igrejamsv"
               target="_blank"
               rel="noopener noreferrer">Documentos</a>
        </li>
        <li class="link text-white">
            <a accesskey="b"
               href="https://horadeberear.com.br/"
               target="_blank"
               rel="noopener noreferrer">Blog</a>
        </li>
        <li class="link text-white">
            <a accesskey="f"
               href="https://www.flickr.com/photos/igrejamsv/albums"
               target="_blank"
               rel="noopener noreferrer">Fotos</a>
        </li>
        <li class="link text-white"><a accesskey="c" href="/#contato">Contato</a></li>
        {{-- <li><a href="{{ route('login') }}">Login</a></li>--}}

        <li class="link text-white lg:hidden">
            <a accesskey="e"
               href="https://d1fdloi71mui9q.cloudfront.net/cTsmSxshRLGrYj2OCY24_Estatudo%20MSV%202018.pdf"
               target="_blank"
               rel="noopener noreferrer">Estatuto Social
            </a>
        </li>
        <li class="link text-white lg:hidden">
            <a accesskey="r"
               href="https://d1fdloi71mui9q.cloudfront.net/dqxKYd3SiZdsiLX11mFQ_REGIMENTO%20INTERNO%20DA%20IGREJA%20EVANG%C3%89LICA%20MINIST%C3%89RIO%20SEMEANDO%20A%20VERDADE%20-%2026.02.2020.pdf"
               target="_blank"
               rel="noopener noreferrer">Regimento Interno (minuta)
            </a>
        </li>
    </ul>
</header>
