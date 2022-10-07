@props(['route', 'object', 'title' => 'Editar', 'icon' => 'create-outline'])

<a aria-label="{{ $title }}" href="{{ route($route, $object) }}"
   class="outline-0 rounded-md text-blue-400 border border-blue-400
   hover:text-white hover:bg-blue-400 focus:text-white focus:bg-blue-400
   px-2 py-1 inline-flex justify-center items-center">
    <ion-icon name="{{ $icon }}"></ion-icon>
    <span class="ml-1">{{ $title }}</span>
</a>
