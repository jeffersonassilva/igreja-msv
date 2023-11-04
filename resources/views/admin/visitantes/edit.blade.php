<x-app-layout>
    <x-slot name="header">
        Editar Visitante
    </x-slot>

    <section class="flex flex-col gap-1">
        <div class="bg-white border border-gray-200 rounded-md shadow-sm p-4 sm:p-6 lg:p-8 mb-6
                    dark:bg-[#252c47] dark:border-[#252c47]">
            <div class="flex md:flex-row justify-center gap-3 sm:gap-6 md:gap-8">

                <div class="flex-1 flex flex-col gap-3 md:gap-4">
                    <div>
                        <div class="font-thin text-xs md:text-sm text-gray-500">Nome</div>
                        <div class="text-gray-800 dark:text-[#d0d9e6] text-xl sm:text-2xl md:text-3xl font-medium sm:font-normal">
                            {{ $data->nome }}
                        </div>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-2 gap-y-4">
                        <div class="flex flex-col">
                            <div class="font-thin text-xs md:text-sm text-gray-500">Sexo</div>
                            <div class="text-gray-800 dark:text-[#d0d9e6]">{{ $data->sexo === 'M' ? 'Masculino' : 'Feminino' }}</div>
                        </div>

                        <div class="flex flex-col">
                            <div class="font-thin text-xs md:text-sm text-gray-500">Data de Nascimento</div>
                            <div class="text-gray-800 dark:text-[#d0d9e6]">{{ \Carbon\Carbon::parse($data->dt_nascimento)->format('d/m/Y') }}</div>
                        </div>

                        <div class="flex flex-col">
                            <div class="font-thin text-xs md:text-sm text-gray-500">Telefone</div>
                            <div class="text-gray-800 dark:text-[#d0d9e6]">{{ $data->telefone }}</div>
                        </div>

                        <div class="flex flex-col">
                            <div class="font-thin text-xs md:text-sm text-gray-500">WhatsApp?</div>
                            <div class="text-gray-800 dark:text-[#d0d9e6]">{{ $data->whatsapp == '1' ? 'Sim' : 'Não' }}</div>
                        </div>

                        <div class="flex flex-col">
                            <div class="font-thin text-xs md:text-sm text-gray-500">É batizado nas águas?</div>
                            <div class="text-gray-800 dark:text-[#d0d9e6]">{{ $data->batizado == '1' ? 'Sim' : 'Não' }}</div>
                        </div>

                        <div class="flex flex-col col-span-2 md:col-span-3">
                            <div class="font-thin text-xs md:text-sm text-gray-500">Endereço</div>
                            <div class="text-gray-800 dark:text-[#d0d9e6]">{{ $data->endereco }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('visitantes.update', $data) }}"
              method="post">
            @method('PUT')
            @csrf

            <x-form.input label="Responsável"
                          name="responsavel"
                          maxlength="255"
                          value="{{ old('responsavel') ?? $data->responsavel }}"
                          :observacoes='["Digite o nome da pessoa que será responsável por realizar o acompanhamento deste visitante."]' />

            <x-form.checkbox label="Sem sucesso"
                          name="sem_sucesso"
                          value="{{ old('sem_sucesso') ?? $data->sem_sucesso }}"
                          :observacoes='["Marque esta opção se não foi possível fazer contato com este visitante."]' />

            <x-form.input label="Data do primeiro contato"
                          name="dt_primeiro_contato"
                          type="date"
                          size="md:max-w-[250px]"
                          value="{{ old('dt_primeiro_contato') ?? $data->dt_primeiro_contato ? \Carbon\Carbon::parse($data->dt_primeiro_contato)->format('Y-m-d') : null }}"
                          :observacoes='["Informe a data que foi realizado o primeiro contato com o visitante."]'
            />

            <x-form.input label="Data da segunda visita"
                          name="dt_segunda_visita"
                          type="date"
                          size="md:max-w-[250px]"
                          value="{{ old('dt_segunda_visita') ?? $data->dt_segunda_visita ? \Carbon\Carbon::parse($data->dt_segunda_visita)->format('Y-m-d') : null }}"
                          :observacoes='["Informe a data caso o visitante tenha realizado a segunda visita."]'
            />

            <x-form.checkbox label="Congregando?"
                             name="congregando"
                             value="{{ old('congregando') ?? $data->congregando }}"
                             :observacoes='["Marque esta opção se o visitante estiver congregando conosco."]' />

            <x-form.checkbox label="Deseja batismo?"
                             name="deseja_batismo"
                             value="{{ old('deseja_batismo') ?? $data->deseja_batismo }}"
                             :observacoes='["Marque esta opção se o visitante deseja ser batizado."]' />

            <x-form.checkbox label="Tornou-se membro?"
                             name="membro_ativo"
                             value="{{ old('membro_ativo') ?? $data->membro_ativo }}"
                             :observacoes='["Marque esta opção se o visitante tornou-se membro ativo da igreja."]' />

            <x-form.textarea label="Observações"
                             name="observacao"
                             value="{{ old('observacao') ?? $data->observacao }}"
                             :observacoes='[
                                "Utilize esse campo para complementar alguma informação importante a respeito do visitante.",
                                "Máximo de 1000 caracteres."
                             ]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('visitantes')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
