<section id="videos" class="py-24 md:py-32 bg-[#f3d9ce4d] overflow-hidden relative">
    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-[#eca413]/30 to-transparent">
    </div>
    <div class="section-container relative">
        <div class="text-center mb-12" style="opacity: 1; transform: none;">
            <div class="inline-flex items-center gap-2 text-[#c9731d] mb-4"><svg xmlns="http://www.w3.org/2000/svg"
                    width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wheat">
                    <path d="M2 22 16 8"></path>
                    <path d="M3.47 12.53 5 11l1.53 1.53a3.5 3.5 0 0 1 0 4.94L5 19l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z">
                    </path>
                    <path d="M7.47 8.53 9 7l1.53 1.53a3.5 3.5 0 0 1 0 4.94L9 15l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z">
                    </path>
                    <path d="M11.47 4.53 13 3l1.53 1.53a3.5 3.5 0 0 1 0 4.94L13 11l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z">
                    </path>
                    <path d="M20 2h2v2a4 4 0 0 1-4 4h-2V6a4 4 0 0 1 4-4Z"></path>
                    <path d="M11.47 17.47 13 19l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L5 19l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z">
                    </path>
                    <path d="M15.47 13.47 17 15l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L9 15l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z">
                    </path>
                    <path d="M19.47 9.47 21 11l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L13 11l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z">
                    </path>
                </svg>
                <p class="text-sm uppercase tracking-[0.2em] font-medium">Mensagens</p>
            </div>
            <h2 class="font-serif text-3xl md:text-4xl lg:text-5xl font-medium text-[#4a2f1c]">
                Últimos Cultos e Pregações
            </h2>
            <p class="mt-4 text-yellow-900 font-thin max-w-2xl mx-auto">
                Assista às nossas mensagens e cultos gravados. Alimente sua fé com a Palavra de Deus.
            </p>
        </div>

        @php
            $infoVideoPrincipal = '{
                "publishedAt": "2025-10-29T20:56:51Z",
                "title": "A Presença de Deus: Não nos carros da conveniência, mas nos ombros da obediência",
                "thumbnails": {
                    "standard": {
                        "url": "https://i.ytimg.com/vi/fctu9HyLnd4/sddefault.jpg",
                        "width": 640,
                        "height": 480
                    }
                }
            }';

            $videoPrincipal = json_decode($infoVideoPrincipal);
        @endphp

        <div class="grid lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2" style="opacity: 1; transform: none;">
                <a href="https://www.youtube.com/watch?v=fctu9HyLnd4&pp=2AYi" target="_blank" rel="noopener noreferrer">
                    <div class="relative group cursor-pointer rounded-2xl overflow-hidden shadow-xl">
                        <div class="aspect-video">
                            <img src="{{ $videoPrincipal->thumbnails->standard->url }}"
                                alt="Culto de Domingo - A Fé que Transforma"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div
                                class="w-20 h-20 rounded-full bg-primary/90 flex items-center justify-center transition-transform duration-300 group-hover:scale-110 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"
                                    fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-play text-primary-foreground ml-1">
                                    <polygon points="6 3 20 12 6 21 6 3"></polygon>
                                </svg>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <span class="inline-block px-3 py-1 rounded-full bg-[#f47b25] text-white text-xs mb-3">
                                Em Destaque
                            </span>
                            <h3 class="font-serif text-xl md:text-2xl font-medium text-white mb-2">
                                {{ $videoPrincipal->title }}
                            </h3>
                            <div class="flex items-center gap-4 text-white/70 text-sm">
                                <span class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                        height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>7:49
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-calendar">
                                        <path d="M8 2v4"></path>
                                        <path d="M16 2v4"></path>
                                        <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                        <path d="M3 10h18"></path>
                                    </svg>
                                    @php
                                        $data_objeto = new DateTime($videoPrincipal->publishedAt);
                                        $formatter = IntlDateFormatter::create(
                                            'pt_BR', // Locale
                                            IntlDateFormatter::FULL, // Tipo de data (não usado aqui, mas necessário)
                                            IntlDateFormatter::FULL, // Tipo de hora (não usado aqui, mas necessário)
                                            'America/Sao_Paulo', // Fuso horário (opcional, ajuste conforme necessário)
                                            IntlDateFormatter::GREGORIAN, // Calendário (opcional)
                                            'dd MMM yyyy' // Padrão de formato desejado: dia (dd), mês abreviado (MMM) e ano (yyyy)
                                        );
                                        $data_formatada = $formatter->format($data_objeto);
                                        $data_formatada = str_replace('.', '', $data_formatada); // Remove o ponto
                                        $partes = explode(' ', $data_formatada); // Divide em dia, mês e ano
                                        $partes[1] = ucfirst($partes[1]); // Coloca a primeira letra do mês em maiúscula

                                        $resultado_final = implode(' ', $partes); // Junta tudo novamente
                                    @endphp
                                    {{ $resultado_final }}
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            @php
            $listaVideos = [
                [
                    'link' => 'https://www.youtube.com/watch?v=IohLTlzoaGY',
                    'title' => "A Reforma Protestante: Quando a Verdade Transformou a História",
                    'publishedAt' => "18 Out 2025",
                    'time' => '8:41',
                    'thumbnail' => 'https://i.ytimg.com/vi/IohLTlzoaGY/mqdefault.jpg'
                ],
                [
                    'link' => 'https://www.youtube.com/watch?v=SpkWBw_TlHU&pp=2AYD',
                    'title' => "Betumarás sua arca, tanto por dentro como por fora",
                    'publishedAt' => "22 Mar 2022",
                    'time' => '58:13',
                    'thumbnail' => 'https://i.ytimg.com/vi/SpkWBw_TlHU/mqdefault.jpg'
                ],
                [
                    'link' => 'https://www.youtube.com/watch?v=LN6CN7Q-1Xc',
                    'title' => "Justificados pela graça",
                    'publishedAt' => "14 Mar 2022",
                    'time' => '52:53',
                    'thumbnail' => 'https://i.ytimg.com/vi/LN6CN7Q-1Xc/mqdefault.jpg'
                ],
                [
                    'link' => 'https://www.youtube.com/watch?v=5o_VQqDsD1Q',
                    'title' => "Culto de Celebração",
                    'publishedAt' => "15 Mar 2021",
                    'time' => '19:14',
                    'thumbnail' => 'https://i.ytimg.com/vi/5o_VQqDsD1Q/mqdefault.jpg'
                ],
                [
                    'link' => 'https://www.youtube.com/watch?v=coY8Ik6dgD4',
                    'title' => "Jesus lavou os pés dos discipulos",
                    'publishedAt' => "16 Nov 2020",
                    'time' => '47:27',
                    'thumbnail' => 'https://i.ytimg.com/vi/coY8Ik6dgD4/mqdefault.jpg'
                ]
            ];
            @endphp
            <div class="lg:col-span-1" style="opacity: 1; transform: none;">
                <div class="bg-[#faf9f4] rounded-2xl shadow-lg overflow-hidden h-full">
                    <div class="overflow-y-auto max-h-[400px]">
                        @foreach ($listaVideos as $key => $v)
                        <a href="{{ $v['link'] }}" target="_blank" rel="noopener noreferrer">
                            <div
                                class="flex gap-3 p-3 hover:bg-secondary/50 cursor-pointer transition-colors border-b border-border/50 last:border-0">
                                <div class="relative flex-shrink-0 w-32 md:w-40">
                                    <div class="aspect-video rounded-lg overflow-hidden">
                                        <img src="{{ $v['thumbnail'] }}" alt="Estudo Bíblico - O Sermão da Montanha"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div
                                        class="absolute bottom-1 right-1 px-1.5 py-0.5 rounded bg-black/80 text-white text-xs">
                                        {{ $v['time'] }}
                                    </div>
                                    <div
                                        class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                        <div class="w-8 h-8 rounded-full bg-primary/90 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-play text-primary-foreground ml-0.5">
                                                <polygon points="6 3 20 12 6 21 6 3"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <span class="text-xs text-muted-foreground mb-1 block">
                                        #{{ $key + 2 }}
                                    </span>
                                    <h5 class="text-sm text-foreground line-clamp-2 leading-snug">
                                        {{ $v['title'] }}
                                    </h5>
                                    <div class="mt-1 font-thin text-xs text-yellow-700">
                                        <span>{{ $v['publishedAt'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-10" style="opacity: 1; transform: none;">
            <a href="https://www.youtube.com/@HoradeBerear" target="_blank" rel="noopener noreferrer"
                class="bg-yellow-400/90 hover:opacity-90 transition-all duration-300 shadow-md px-6 py-3 rounded-full inline-flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-play">
                    <polygon points="6 3 20 12 6 21 6 3"></polygon>
                </svg>Ver Todos no YouTube
            </a>
        </div>
    </div>
</section>
