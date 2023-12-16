@props(['id' => 'dialog-confirm', 'message' => 'Você tem certeza que deseja excluir este registro?', 'confirmButtonTitle' => 'Sim, certeza!', 'cancelButtonTitle' => 'Não'])

<div id="{{ $id }}" tabindex="-1" class="hidden bg-gray-900 bg-opacity-50 fixed inset-0 z-40 overflow-y-auto overflow-x-hidden h-modal md:h-full">
    <div class="relative mx-auto p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button" onclick="modalCloseAction('{{ $id }}')" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500">{!! $message !!}</h3>
                <button type="button" onclick="modalConfirmAction('{{ $id }}')" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-4 py-2 text-center mr-2">
                    {{ $confirmButtonTitle }}
                </button>
                <button type="button" onclick="modalCancelAction('{{ $id }}')" class="text-gray-600 bg-neutral hover:bg-neutral-dark focus:bg-neutral-dark rounded-md text-sm font-medium px-4 py-2 focus:z-10">
                    {{ $cancelButtonTitle }}
                </button>
            </div>
        </div>
    </div>
</div>
