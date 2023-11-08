<x-app-layout>
    <x-slot name="header">
        Editar Evento
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('membros.update', $data) }}"
              method="post">
            @method('PUT')
            @csrf

            <div class="text-lg font-medium uppercase pt-8 pb-4 text-gray-700 dark:text-white">Informações Pessoais</div>

            <x-form.input label="Nome"
                          name="nome"
                          maxlength="255"
                          value="{{ old('nome') ?? $data->nome }}"
                          :required="true"
                          :observacoes='["Máximo de 255 caracteres."]' />

            <x-form.select label="Sexo"
                           name="sexo"
                           size="md:max-w-[250px]"
                           :reference="$data->situacao"
                           :required="true"
                           :options='[["id" => "M", "descricao" => "Masculino"], ["id" => "F", "descricao" => "Feminino" ]]'
                           :observacoes='["Selecione uma das opções."]'
            />

            <x-form.input label="Data de Nascimento"
                          name="dt_nascimento"
                          type="date"
                          size="md:max-w-[250px]"
                          value="{{ old('dt_nascimento') ?? $data->dt_nascimento ? \Carbon\Carbon::parse($data->dt_nascimento)->format('Y-m-d') : null }}"
                          :observacoes='["A data de nascimento é para termos o controle de aniversariantes."]'
            />

            <x-form.select label="Estado Civil"
                           name="estado_civil"
                           size="md:max-w-[250px]"
                           :blank="true"
                           :reference="$data->estado_civil"
                           :options="$estadosCivis"
                           :observacoes='["Selecione uma das opções."]'
            />

            <x-form.input label="Data de Casamento"
                          name="dt_casamento"
                          type="date"
                          size="md:max-w-[250px]"
                          value="{{ old('dt_casamento') ?? $data->dt_casamento ? \Carbon\Carbon::parse($data->dt_casamento)->format('Y-m-d') : null }}"
                          :observacoes='["Informe a data de casamento caso o estado civil seja casado(a)."]'
            />

            <div class="text-lg font-medium uppercase pt-8 pb-4 text-gray-700 dark:text-white">Contatos</div>

            <x-form.input label="Telefone"
                          mask="telefone"
                          name="telefone"
                          maxlength="15"
                          size="md:max-w-[250px]"
                          value="{{ old('telefone') ?? $data->telefone }}"
                          :observacoes='["Informe o telefone de contato."]'
            />

            <x-form.input label="E-mail"
                          name="email"
                          maxlength="255"
                          value="{{ old('email') ?? $data->email }}"
                          :observacoes='["Informe o e-mail de contato."]'
            />

            <div class="text-lg font-medium uppercase pt-8 pb-4 text-gray-700 dark:text-white">Endereço</div>

            <x-form.input label="CEP"
                          name="cep"
                          maxlength="9"
                          mask="cep"
                          size="md:max-w-[250px]"
                          value="{{ old('cep') ?? $data->cep }}"
                          :observacoes='["Informe o CEP do domicílio."]'
            />

            <x-form.input label="Logradouro"
                          name="logradouro"
                          maxlength="255"
                          value="{{ old('logradouro') ?? $data->logradouro }}"
                          :observacoes='[
                            "Informe o endereço domiciliar completo.",
                            "Máximo de 255 caracteres."
                          ]'
            />

            <x-form.input label="Número"
                          name="numero"
                          mask="numero"
                          maxlength="10"
                          size="md:max-w-[150px]"
                          value="{{ old('numero') ?? $data->numero }}"
                          :observacoes='["Máximo de 10 caracteres."]'
            />

            <x-form.input label="Complemento"
                          name="complemento"
                          maxlength="255"
                          value="{{ old('complemento') ?? $data->complemento }}"
                          :observacoes='["Máximo de 255 caracteres."]'
            />

            <x-form.input label="Bairro"
                          name="bairro"
                          maxlength="255"
                          value="{{ old('bairro') ?? $data->bairro }}"
                          :observacoes='["Máximo de 255 caracteres."]'
            />

            <x-form.input label="Cidade"
                          name="cidade"
                          maxlength="255"
                          value="{{ old('cidade') ?? $data->cidade }}"
                          :observacoes='["Máximo de 255 caracteres."]'
            />

            <x-form.select label="UF"
                           name="uf"
                           size="md:max-w-[150px]"
                           :blank="true"
                           :reference="$data->uf"
                           :options="$ufs"
                           :observacoes='["Selecione uma das opções."]'
            />

            <x-form.input label="País"
                          name="pais"
                          maxlength="255"
                          value="{{ old('pais') ?? $data->pais }}"
                          :observacoes='["Máximo de 255 caracteres."]'
            />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('membros')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
