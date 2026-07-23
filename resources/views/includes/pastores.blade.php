<section id="pastores" class="py-24 md:py-32 bg-[#faf9f4] overflow-hidden relative">
    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-[#eca413]/30 to-transparent">
    </div>
    <div class="section-container relative">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div class="relative" style="opacity: 1; transform: none;">
                <div class="rounded-3xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('img/pastores.jpg') }}" loading="lazy" width="720" height="480"
                        alt="Samuel e Hacsa" title="Samuel e Hacsa" class="rounded-md w-full">
                </div>
                <div class="absolute -z-10 top-6 left-6 w-full h-full rounded-3xl border-2 border-primary/30"></div>
                <div class="absolute -z-10 top-12 left-12 w-full h-full rounded-3xl bg-accent/10"></div>
            </div>
            <div style="opacity: 1; transform: none;">
                <div class="inline-flex items-center gap-2 text-[#c9731d] mb-4"><svg xmlns="http://www.w3.org/2000/svg"
                        width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wheat">
                        <path d="M2 22 16 8"></path>
                        <path d="M3.47 12.53 5 11l1.53 1.53a3.5 3.5 0 0 1 0 4.94L5 19l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z">
                        </path>
                        <path d="M7.47 8.53 9 7l1.53 1.53a3.5 3.5 0 0 1 0 4.94L9 15l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z">
                        </path>
                        <path
                            d="M11.47 4.53 13 3l1.53 1.53a3.5 3.5 0 0 1 0 4.94L13 11l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z">
                        </path>
                        <path d="M20 2h2v2a4 4 0 0 1-4 4h-2V6a4 4 0 0 1 4-4Z"></path>
                        <path
                            d="M11.47 17.47 13 19l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L5 19l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z">
                        </path>
                        <path
                            d="M15.47 13.47 17 15l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L9 15l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z">
                        </path>
                        <path
                            d="M19.47 9.47 21 11l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L13 11l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z">
                        </path>
                    </svg>
                    <p class="text-sm uppercase tracking-[0.2em] font-medium">Liderança</p>
                </div>
                <h2 class="font-serif text-3xl md:text-4xl lg:text-5xl font-medium mb-6 text-[#4a2f1c]">
                    {!! $pastor->titulo !!}
                </h2>
                <div class="space-y-4 text-yellow-900 font-thin leading-relaxed">
                    {{ $pastor->descricao }}
                </div>
                <blockquote class="mt-8 p-6 bg-[#f3d9ce80] rounded-2xl border-l-4 border-yellow-400">
                    <p class="italic font-thin text-[#4a2f1c]/80">
                        "Bem-aventurado o povo a quem assim sucede! Sim, feliz é o povo cujo Deus é o Senhor!"
                    </p>
                    <cite class="text-sm font-thin text-[#4a2f1c]/80 mt-2 block">— Salmos 144:15</cite>
                </blockquote>
                <div class="mt-8">
                    <a href="https://www.instagram.com/samuelnovaisjr/" target="_blank" rel="noopener noreferrer"
                        class="bg-yellow-500 hover:opacity-90 transition-all duration-300 shadow-md text-[#f7f5ed] px-6 py-3 rounded-full inline-flex items-center justify-center gap-2">
                        Siga no Instagram
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
