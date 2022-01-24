<style type="text/css">
    footer {
        background: var(--dark);
        color: var(--white);
        min-height: 200px;
        display: flex;
        justify-content: space-between;
        /*align-items: center;*/
        padding: 25px 80px;
        line-height: 1.8em;
    }

    footer .info {
        padding: 0 20px;
    }

    footer .info .title {
        font-size: 1.2em;
        padding-bottom: 20px;
    }

    footer .info div {
        font-size: 1em;
        font-weight: 100;
        display: flex;
        align-items: center;
        color: var(--gray);
    }

    footer .info div.icon_text :first-child {
        padding-right: 10px;
    }

    footer .info span a {
        text-decoration: none;
        color: var(--link-light);
        padding: 0 0 3px 0 !important;
    }

    footer .info div.rs_icones {
        width: 160px;
        display: flex;
        /*justify-content: space-around;*/
        align-items: center;
        font-size: 1.8em;
    }

    footer .info div.rs_icones a {
        padding-right: 20px;
        color: var(--gray);
        transition: .25s;
    }

    footer .info div.rs_icones a:hover {
        color: var(--white);
        transform: translateY(-3px);
    }
</style>

<footer id="contato">
    <div>
        <img src="{{ asset('/img/logo.png') }}" alt="logo" style="width: 180px">
    </div>
    <div class="info">
        <p class="title">Informações</p>
        <div class="icon_text">
            <ion-icon name="mail"></ion-icon>
            <span>contato@igrejamsv.org</span>
        </div>
        <div class="icon_text">
            <ion-icon name="call"></ion-icon>
            <span>(61) 99689-9317</span>
        </div>
    </div>
    <div class="info">
        <p class="title">Localização</p>
        <div>
            <span>PA 03 Lote 02 - Jardins Mangueiral - DF</span>
        </div>
        <div class="icon_text">
            <span>
                <ion-icon name="location-sharp"></ion-icon>
                <a href="https://goo.gl/maps/VB9GWVqWG4FKiccV9" target="_blank">Google Maps</a>
            </span>
        </div>
    </div>
    <div class="info">
        <p class="title">Redes Sociais</p>
        <div class="rs_icones">
            <a href="https://www.instagram.com/igreja_msv/" target="_blank">
                <ion-icon name="logo-instagram"></ion-icon>
            </a>
            <a href="https://www.facebook.com/igrejamsvsede/" target="_blank">
                <ion-icon name="logo-facebook"></ion-icon>
            </a>
            <a href="https://www.youtube.com/channel/UC9kd9LcqRm1WnBMHygcpFgg" target="_blank">
                <ion-icon name="logo-youtube"></ion-icon>
            </a>
        </div>
    </div>
</footer>

<div style="height: 1000px">
    teste
</div>
