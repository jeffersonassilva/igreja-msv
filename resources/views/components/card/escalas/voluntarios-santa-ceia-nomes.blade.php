@props([
    'voluntario',
    'escala',
    'loop',
    ])

<li class="line-clamp-1">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            @if($voluntario->voluntario->foto)
                <img src="{{ asset($voluntario->voluntario->foto) }}" alt="avatar"
                     class="w-[30px] h-[30px] rounded-full object-cover aspect-square p-[1px] border-2
                            @if($escala->fechada) border-[#cddccd] @else border-gray-100 @endif">
            @else
                @if($voluntario->voluntario->sexo == 'M')
                    <img src="{{ asset('img/icon_profile_man.jpg') }}" alt="avatar"
                         class="w-[30px] h-[30px] rounded-full object-cover aspect-square p-[1px] border-2
                                @if($escala->fechada) border-[#cddccd] @else border-gray-100 @endif">
                @else
                    <img src="{{ asset('img/icon_profile_woman.jpg') }}" alt="avatar"
                         class="w-[30px] h-[30px] rounded-full object-cover aspect-square p-[1px] border-2
                                @if($escala->fechada) border-[#cddccd] @else border-gray-100 @endif">
                @endif
            @endif
        </div>
        <div class="line-clamp-1 mx-1">
            {{ $voluntario->voluntario->nome }}
        </div>
    </div>
</li>
