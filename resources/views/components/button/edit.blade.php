@props(['route', 'object', 'title' => 'Editar', 'lighter' => false])

<a aria-label="{{ $title }}" href="{{ route($route, $object) }}"
   class="outline-0 rounded-md px-2 py-1 inline-flex justify-center items-center
    @if($lighter)
       text-blue-500 bg-gray-200 hover:bg-gray-300 focus:bg-gray-300
    @else
       bg-blue-400 text-white hover:bg-blue-500 focus:bg-blue-500
    @endif">
    <span class="ml-1">{{ $title }}</span>
</a>
