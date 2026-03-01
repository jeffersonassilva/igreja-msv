@props(['id', 'classe'])

<?php //echo '<pre>'; print_r($classe->toArray()); ?>

<div class="flex items-center mt-2 md:mt-3">
    {{-- @if(count($classe->alunos) > 0)
    @foreach($classe->alunos as $aluno)
    <div class="ml-[-10px]">
        <img src="https://randomuser.me/api/portraits/women/{{ rand(1, 50) }}.jpg" alt=""
            class="rounded-full w-7 border border-white object-cover">
    </div>
    @endforeach
    @endif --}}

    @if($classe->nome === 'Juventude')
    <div class="text-sm font-thin">
        <span class="text-gray-500">Classe especial com adolescentes e jovens.</span>
    </div>
    @elseif(count($classe->alunos) === 0)
    <div class="text-sm font-thin">
        <span class="text-gray-500">Nenhum aluno matriculado.</span>
    </div>
    @else
    <a href="{{ route('calendario.alunos', strtolower($classe->nome)) }}" class="w-full">
        <div class="text-sm font-thin cursor-pointer">
            <span class="font-normal">
                {{
                count($classe->alunos) > 1 ? count($classe->alunos) . ' alunos' : count($classe->alunos) . ' aluno'
                }}
            </span>
            <span class="text-gray-500">
                {{ count($classe->alunos) > 1 ? 'matriculados.' : 'matriculado.' }}
            </span>
        </div>
    </a>
    @endif
</div>
