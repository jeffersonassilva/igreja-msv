<section id="propositos" class="py-24 md:py-32 bg-[#faf9f4] relative overflow-hidden flex justify-center">
    <div class="section-container relative">
        <div class="text-center mb-16" style="opacity: 1; transform: none;">
            <div class="inline-flex items-center gap-2 text-[#eca413] mb-4"><svg xmlns="http://www.w3.org/2000/svg"
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
                <p class="text-sm uppercase tracking-[0.2em] font-medium">O que nos move</p><svg
                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-wheat">
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
            </div>
            <h2 class="font-serif text-3xl md:text-4xl lg:text-5xl font-medium text-[#4a2f1c]">
                Nossos Propósitos
            </h2>
        </div>
        <div class="grid md:grid-cols-[4fr_7fr_4fr] gap-6 md:gap-8" style="opacity: 1;">
            @foreach($propositos as $proposito)
            <div class="group text-center p-8 rounded-2xl border transition-all duration-300 hover:shadow-xl bg-[#eca413]/5 border-[#eca413]/20 hover:border-[#eca413]/40"
                style="opacity: 1; transform: none;">

                @if ($proposito->titulo === 'Missão')
                <div
                    class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-6 transition-transform duration-300 group-hover:scale-110 bg-[#eca413]/10 text-[#eca413]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-target">
                        <circle cx="12" cy="12" r="10"></circle>
                        <circle cx="12" cy="12" r="6"></circle>
                        <circle cx="12" cy="12" r="2"></circle>
                    </svg>
                </div>
                @elseif ($proposito->titulo === 'Nossa Visão')
                <div
                    class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-6 transition-transform duration-300 group-hover:scale-110 bg-[#c9731d]/10 text-[#c9731d]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-eye">
                        <path
                            d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0">
                        </path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </div>
                @else
                <div
                    class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-6 transition-transform duration-300 group-hover:scale-110 bg-[#f47b25]/10 text-[#f47b25]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-heart">
                        <path
                            d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                        </path>
                    </svg>
                </div>
                @endif

                <h3 class="font-serif text-xl md:text-2xl font-medium mb-4 text-[#4a2f1c]">
                    {{ $proposito->titulo }}
                </h3>
                <p class="text-[#756357] leading-relaxed">
                    {{ $proposito->descricao }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>
