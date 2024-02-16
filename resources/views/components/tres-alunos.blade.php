@props(['classe'])

<div class="flex items-center mt-2 md:mt-3">
{{--    @if(count($classe->alunos) > 0)--}}
{{--        @foreach($classe->alunos as $aluno)--}}
{{--        <div class="ml-[-10px]">--}}
{{--            <img src="https://randomuser.me/api/portraits/women/{{ rand(1, 50) }}.jpg" alt=""--}}
{{--                 class="rounded-full w-7 border border-white object-cover">--}}
{{--        </div>--}}
{{--        @endforeach--}}
{{--    @endif--}}
    <div class="text-sm font-thin">
        @if(count($classe->alunos) > 0)
            <span class="font-normal ml-4-ATUALIZAR">
                {{ count($classe->alunos) > 1 ? count($classe->alunos) . ' alunos' : count($classe->alunos) . ' aluno' }}
            </span>
        @endif
        <span class="text-gray-500">
            @if(count($classe->alunos) === 0)
                Nenhum aluno matriculado.
            @else
                {{ count($classe->alunos) > 1 ? 'matriculados.' : 'matriculado.' }}
            @endif
        </span>
    </div>
</div>
