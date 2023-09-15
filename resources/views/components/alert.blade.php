<div {{ $attributes->merge(['class' => 'block']) }}>
    @if (session('message'))
        <div id="message_alert" style="background-color: {{ session('colorTypeMessage') }}"
             class="p-4 rounded-md flex justify-between items-center">
            <span class="text-gray-700 pl-2">
                {{ session('message') }}
            </span>
            <span class="text-2xl flex items-center cursor-pointer" id="close-message-btn">
                <ion-icon name="close-outline"></ion-icon>
            </span>
        </div>
    @endif
</div>
