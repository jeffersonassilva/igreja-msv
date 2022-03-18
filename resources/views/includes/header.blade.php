<header class="flex justify-between items-center p-4 lg:p-6 xl:p-8">
    <a href="{{ route('index') }}">
        <img src="{{ asset('/img/logo-branca.png') }}" alt="logo" class="logos w-[70px] sm:w-[90px] md:w-[110px] md:w-[130px]">
    </a>
    <div class="toggle md:hidden"></div>
    <ul class="navigation">
        <li class="link"><a href="{{ route('index') }}">Home</a></li>
        <li class="link"><a href="/#propositos">Propósitos</a></li>
        <li class="link"><a href="{{ route('ofertas') }}">Ofertas</a></li>
        <li class="link"><a href="https://horadeberear.com.br/" target="_blank">Blog</a></li>
{{--        <li class="link"><a href="/#fotos">Fotos</a></li>--}}
        <li class="link"><a href="/#pastores">Pastores</a></li>
        <li class="link"><a href="/#programacao">Programação</a></li>
        <li class="link"><a href="/#contato">Contato</a></li>
        {{-- <li><a href="{{ route('login') }}">Login</a></li>--}}
    </ul>
</header>
