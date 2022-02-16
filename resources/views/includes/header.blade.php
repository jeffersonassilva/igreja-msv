<style type="text/css">
    header {
        background: var(--dark);
        height: 400px;
        width: 100%;
        padding: 15px 80px;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
    }

    header section {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        max-width: 140px;
    }

    .navigation {
        display: flex;
    }

    .navigation li {
        list-style: none;
    }

    .navigation li a {
        position: relative;
        color: var(--white);
        text-decoration: none;
        margin-left: 40px;
    }
</style>

<header style="background-image: url({{ asset('/img/banner.jpg') }});">
    <section>
        <a href="#">
            <img src="{{ asset('/img/logo.png') }}" alt="logo" class="logo">
        </a>
        <ul class="navigation">
            <li><a href="#">Home</a></li>
            <li><a href="#">Fotos</a></li>
            <li><a href="#programacao">Programação</a></li>
            <li><a href="#contato">Contato</a></li>
{{--            <li><a href="{{ route('login') }}">Login</a></li>--}}
        </ul>
    </section>
</header>
