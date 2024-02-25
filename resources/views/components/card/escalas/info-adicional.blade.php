@props([
    'dirigente' => null,
    'pregador' => null,
    'tema' => null,
    'ministro' => null,
    'escalaFechada',
    ])

@if($dirigente)
    <x-card.escalas.info-adicional-nomes
        label="Dirigente"
        :value="$dirigente"
        :escalaFechada="$escalaFechada"
        icon="person-outline"
        width="74px"
    />
@endif

@if($pregador)
    <x-card.escalas.info-adicional-nomes
        label="Pregador"
        :value="$pregador"
        :escalaFechada="$escalaFechada"
        icon="mic-outline"
        width="74px"
    />
@endif

@if($tema)
    <x-card.escalas.info-adicional-nomes
        label="Tema"
        :value="$tema"
        :escalaFechada="$escalaFechada"
        icon="reader-outline"
        width="50px"
    />
@endif

@if($ministro)
    <x-card.escalas.info-adicional-nomes
        label="Louvor"
        :value="$ministro"
        :escalaFechada="$escalaFechada"
        icon="musical-notes-outline"
        width="59px"
    />
@endif
