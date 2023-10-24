<x-app-layout>
    <x-slot name="header">
        Relatórios Tesouraria
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('relatorios-tesouraria') }}"
              method="get">

            <x-form.select label="Categoria"
                           name="categoria"
                           size="md:max-w-[300px]"
                           :blank="true"
                           blankName="Todos"
                           :reference="$filtro->categoria"
                           :options="$categorias"
            />

            <x-form.select label="Mês"
                           name="mes"
                           size="md:max-w-[250px]"
                           :blank="true"
                           blankName="Todos"
                           :reference="$filtro->mes"
                           :options="$meses"
            />

            <x-form.select label="Ano"
                           name="ano"
                           size="md:max-w-[250px]"
                           :reference="$filtro->ano"
                           :options="$anos"
            />
        </form>
        <div class="p-4 bg-white rounded-md dark:bg-[#252c47]">
            <div class="flex gap-4 justify-between">
                <div class="flex-1 py-1 text-center text-gray-500 dark:text-gray-400 uppercase">
                    Total: <span class="px-2 font-medium text-lg text-gray-700 dark:text-[#d0d9e6]">{{ \App\Helpers\Strings::getMoedaFormatada($valorTotal, 'R$ ') }}</span>
                </div>
                <div>
                    <button id="btn-gerar-relatorio-pdf"
                            class="outline-0 rounded-md text-2xl sm:text-base text-blue-400 font-normal
                                            border border-blue-400
                                            hover:text-white hover:bg-blue-400
                                            focus:text-white focus:bg-blue-400
                                            px-3 py-2 inline-flex justify-center items-center">
                        <ion-icon name="cloud-download-outline"></ion-icon><span class="hidden sm:block ml-2">Baixar Arquivo</span>
                    </button>
                </div>
            </div>
        </div>
        @foreach($lista as $key => $data)
        <div class="my-4 p-0 sm:p-4 sm:bg-white sm:rounded-lg dark:bg-[#252c47]">
            <section class="w-full">
                <header class="flex items-center gap-4 text-gray-800 bg-white p-4 border border-gray-200 rounded-t-xl
                           dark:bg-[#252c47] dark:border-[#454b54] dark:border-b-transparent dark:text-[#d0d9e6]">
                    <div>{{ $key === 'dinheiro' ? 'DINHEIRO' : 'CARTÃO ' . $key }}</div>
                    <div class="text-sm dark:text-gray-400 text-gray-500">Total: {{ \App\Helpers\Strings::getMoedaFormatada($data['total'], 'R$ ') }}</div>
                </header>
                <div class="bg-gray-200 px-3 py-4 sm:px-6 flex justify-between text-sm sm:text-base uppercase font-medium
                        dark:bg-[#1c2039] dark:text-white dark:border dark:border-[#454b54]">
                    <div class="w-1/4 text-center">Data</div>
                    <div class="w-1/4 text-center">Descrição</div>
                    <div class="w-1/4 text-center">Valor</div>
                    <div class="w-1/4 text-center">Categoria</div>
                </div>
                @foreach($data['itens'] as $linha)
                    <div class="bg-gray-50 odd:bg-white py-4 px-2 sm:p-4 sm:px-6 border-b border-x border-gray-200
                        flex gap-1 justify-between
                        dark:bg-[#2e3552] dark:odd:bg-[#2e3552] dark:border-[#454b54]">
                        <div class="w-1/4 text-center text-gray-500 dark:text-[#d0d9e6]">
                            {{ \Carbon\Carbon::parse($linha['data'])->format('d/m/Y') }}
                        </div>
                        <div class="w-1/4 text-center text-gray-500 dark:text-[#d0d9e6]">
                            {{ $linha['descricao'] }}
                        </div>
                        <div class="w-1/4 text-center text-gray-500 dark:text-[#d0d9e6]">
                            {{ \App\Helpers\Strings::getMoedaFormatada($linha['valor'], 'R$ ') }}
                        </div>
                        <div class="w-1/4 text-center text-gray-500 dark:text-[#d0d9e6]">
                            {{ \App\Services\CategoriaService::getDescricaoById($linha['categoria']) }}
                        </div>
                    </div>
                @endforeach
            </section>
        </div>
        @endforeach
    </section>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#mes, #ano, #categoria').on('change', function () {
                $('.form-horizontal').submit();
            });

            $('#btn-gerar-relatorio-pdf').on('click', function () {
                const queryString = window.location.search;
                window.open('{{ route('relatorios-tesouraria.por-cartao') }}' + queryString, '_blank');
            });
        });
    </script>
</x-app-layout>
