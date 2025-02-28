<section id="programacao" class="flex flex-col p-3 pb-10 md:p-0 md:py-10 md:pb-20">
    <div class="w-full sm:container md:mx-auto md:max-w-[1080px]">
        <h2 class="titulo-separador">Programação</h2>

        <div class="mb-8 flex flex-col sm:justify-center sm:items-center px-4">
            <p class="text-gray-600 text-sm sm:text-base">
                Você pode verificar a agenda detalhada da nossa igreja nos links abaixo.
            </p>
            <span class="text-gray-500 text-xs sm:text-sm font-thin">
                * Mudanças podem ocorrer se necessário.
            </span>
            <div class="flex gap-2 sm:gap-4 mt-4">
                <div class="bg-gray-100 overflow-hidden rounded-lg flex items-center">
                    <ion-icon name="document-text-outline"
                              class="py-2 pl-2 sm:pl-3 pr-1 sm:pr-2 text-gray-500">
                    </ion-icon>
                    <a href="{{ asset('files/agenda_2025_1_semestre.pdf') }}"
                       target="_blank"
                       class="text-xs sm:text-sm md:text-base text-blue-500 pr-2 sm:pr-3">1&ordm; Semestre.pdf</a>
                </div>
                <div class="bg-gray-100 overflow-hidden rounded-lg flex items-center">
                    <ion-icon name="document-text-outline"
                              class="py-2 pl-2 sm:pl-3 pr-1 sm:pr-2 text-gray-500">
                    </ion-icon>
                    <a href="{{ asset('files/agenda_2025_2_semestre.pdf') }}"
                       target="_blank"
                       class="text-xs sm:text-sm md:text-base text-blue-500 pr-2 sm:pr-3">2&ordm; Semestre.pdf</a>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 p-3 w-full md:flex-row sm:px-8">
            <div class="flex gap-4 py-4">
                <div class="text-2xl pt-1 text-gray-500">
                    <ion-icon name="calendar-outline"></ion-icon>
                </div>
                <div class="flex flex-col gap-1 md:gap-2">
                    <div class="font-medium mb-1 md:text-xl">Terça-feira</div>
                    <div class="text-sm text-gray-500 lg:text-base">
                        <span class="font-semibold">19:30</span> - Reunião de Mulheres
                        <span class="text-gray-500 font-thin text-xs">*</span>
                    </div>
                    <div class="text-sm text-gray-500 lg:text-base">
                        <span class="font-semibold">19:30</span> - Reunião de Homens
                        <span class="text-gray-500 font-thin text-xs">*</span>
                    </div>
                    <span class="text-gray-500 font-thin text-xs">
                        * cultos intercalados quinzenalmente
                    </span>
                </div>
            </div>
            <div class="flex gap-4 py-4">
                <div class="text-2xl pt-1 text-gray-500">
                    <ion-icon name="calendar-outline"></ion-icon>
                </div>
                <div class="flex flex-col gap-1 md:gap-2">
                    <div class="font-medium mb-1 md:text-xl">Quarta-feira</div>
                    <div class="text-sm text-gray-500 lg:text-base">
                        <span class="font-semibold">16:00</span> - Tarde de Oração
                    </div>
                    <div class="text-sm text-gray-500 lg:text-base">
                        <span class="font-semibold">20:00</span> - Culto da Vitória
                    </div>
                </div>
            </div>
            <div class="flex gap-4 py-4">
                <div class="text-2xl pt-1 text-gray-500">
                    <ion-icon name="calendar-outline"></ion-icon>
                </div>
                <div class="flex flex-col gap-1 md:gap-2">
                    <div class="font-medium mb-1 md:text-xl">Sábado</div>
                    <div class="text-sm text-gray-500 lg:text-base">
                        <span class="font-semibold">08:00</span> - Consagração
                    </div>
                    <div class="text-sm text-gray-500 lg:text-base">
                        <span class="font-semibold">19:30</span> - Santa Ceia
                        <span class="text-gray-500 font-thin text-xs">
                            (1&ordm; sábado do mês)
                        </span>
                    </div>
                    <div class="text-sm text-gray-500 lg:text-base">
                        <span class="font-semibold">19:30</span> - Culto Jovem
                        <span class="text-gray-500 font-thin text-xs">
                            (2&ordm; sábado do mês)
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex gap-4 py-4">
                <div class="text-2xl pt-1 text-gray-500">
                    <ion-icon name="calendar-outline"></ion-icon>
                </div>
                <div class="flex flex-col gap-1 md:gap-2">
                    <div class="font-medium mb-1 md:text-xl">Domingo</div>
                    <div class="text-sm text-gray-500 lg:text-base">
                        <span class="font-semibold">09:00</span> - Escola Bíblica Dominical
                    </div>
                    <div class="text-sm text-gray-500 lg:text-base">
                        <span class="font-semibold">19:00</span> - Culto Público
                    </div>
{{--                    <span class="text-gray-500 font-thin text-xs">--}}
{{--                        * No 1&ordm; domingo do mês a rede de jovens é responsável pela direção do culto público--}}
{{--                    </span>--}}
                </div>
            </div>
        </div>
    </div>
</section>
