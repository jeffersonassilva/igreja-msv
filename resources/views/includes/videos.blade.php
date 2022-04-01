<section id="videos" class="p-3 md:p-0 md:py-5">
    <div class="container mx-auto max-w-[1280px]">
        <div class="flex flex-col flex-wrap md:flex-row md:items-center p-3 lg:py-10 lg:px-20">
            <div class="mx-auto text-left sm:text-center lg:text-left lg:flex-[50%] lg:flex-1 order-2 lg:order-1">
                <div class="text-lg lg:text-2xl font-medium my-6 lg:my-0 lg:mx-6 2xl:mx-10 text-neutral-700">
                    Confira como foi o culto de domingo.
                </div>
                <div class="font-light text-sm lg:text-base 2xl:text-xl leading-6 lg:leading-7 2xl:leading-9 mb-6 lg:m-6 2xl:m-10">
                    Cultos presenciais todo domingo às 19:00h com transmissão simultânea em nosso canal do YouTube.
                </div>
                <div>
                    <button onclick="window.open('https://www.youtube.com/channel/UC1CLWC5omo_hsO08mXAUMWg')"
                            class="bg-blue-900 text-white px-4 py-2 mb-10 md:px-10 md:py-3 md:mb-6 lg:ml-6 2xl:ml-10 rounded-md">
                        Assista mais vídeos
                    </button>

{{--                    <iframe style="visible:hidden;min-width:100%;height:80px" id="playerPodcloud" frameborder="0" src="https://www.podcloud.com.br/website/external/player?id=c8316ef0-a98e-483a-8287-3d21d45690c6&type=simple" scrolling="no"></iframe><script>function setIframeHeightCO(e,t){var i=document.getElementById(e);i.style.visibility="hidden",i.style.height=t+4+"px",i.style.visibility="visible"}function handleDocHeightMsg(e){var t=JSON.parse(e.data);t.docHeight?setIframeHeightCO("playerPodcloud",t.docHeight):t.href&&setIframe("playerPodcloud",t.href),setTimeout(function(){handleDocHeightMsg(e)},1e4)}window.addEventListener?window.addEventListener("message",handleDocHeightMsg,!1):window.attachEvent&&window.attachEvent("onmessage",handleDocHeightMsg);</script>--}}
                </div>
            </div>
            <div class="relative mx-auto lg:flex-[50%] lg:flex-1 flex justify-center items-center order-1 lg:order-2 cursor-pointer">
                @if($video)
                    <a href="{{ 'https://www.youtube.com/watch?v=' . $video['id']['videoId'] }}"
                       target="_blank" class="bg-gray-200">
                        <img loading="lazy" width="540" height="306"
                             src="{{ $video['snippet']['thumbnails']['high']['url'] }}"
                             alt="Último Vídeo Postado no YouTube">
                    </a>
                    <a href="{{ 'https://www.youtube.com/watch?v=' . $video['id']['videoId'] }}"
                       target="_blank" class="absolute opacity-60 hover:opacity-70">
                        <ion-icon class="text-[60px] md:text-[70px]" name="logo-youtube"></ion-icon>
                    </a>
                @else
                    <a href="https://www.youtube.com/channel/UC1CLWC5omo_hsO08mXAUMWg"
                       target="_blank" class="bg-gray-200">
                        <img loading="lazy" width="540" height="306" src="{{ asset('img/canal-youtube.jpg') }}"
                             alt="Último Vídeo Postado no YouTube">
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>
