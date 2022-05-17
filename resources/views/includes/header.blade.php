<header class="flex justify-between items-center p-3 md:p-4 lg:p-6 lg:pl-10">
    <a href="{{ route('index') }}" class="outline-0 border border-transparent hover:opacity-70 focus:opacity-70 focus:border focus:border-dashed focus:border-gray-400">
        <img src="{{ asset('/img/logo-branca.png') }}" alt="logo" class="w-[70px] sm:w-[90px] md:w-[110px] md:w-[130px]">
    </a>
    <div class="toggle lg:hidden"></div>
    <ul class="navigation hidden lg:flex">
        <li class="link text-white"><a href="{{ route('index') }}">Home</a></li>
        <li class="link text-white"><a href="/#propositos">Propósitos</a></li>
        <li class="link text-white"><a href="{{ route('ofertas') }}">Ofertas</a></li>
        <li class="link text-white"><a href="https://horadeberear.com.br/" target="_blank">Blog</a></li>
        <li class="link text-white"><a href="https://www.flickr.com/photos/igrejamsv/albums" target="_blank">Fotos</a></li>
        <li class="link text-white"><a href="/#pastores">Pastores</a></li>
        <li class="link text-white"><a href="/#programacao">Programação</a></li>
        <li class="link text-white"><a href="/#contato">Contato</a></li>
        {{-- <li><a href="{{ route('login') }}">Login</a></li>--}}
    </ul>
</header>
