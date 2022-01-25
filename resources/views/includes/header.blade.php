<header>
    <a href="#">
        <img src="{{ asset('/img/logo-preta.png') }}" alt="logo" class="logo">
    </a>
    <div class="toggle"></div>
    <ul class="navigation">
        <li class="link"><a href="{{ route('index') }}">Home</a></li>
        <li class="link"><a href="#fotos">Fotos</a></li>
        <li class="link"><a href="#">Programação</a></li>
        <li class="link"><a href="/#contato">Contato</a></li>
        {{-- <li><a href="{{ route('login') }}">Login</a></li>--}}
    </ul>
</header>
