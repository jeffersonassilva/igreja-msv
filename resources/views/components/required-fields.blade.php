<div>
    @if($errors->any())
        <div id="message_alert" style="background-color: #ffb9b9;"
             class="p-4 mb-4 rounded-md flex justify-between items-center">
            <span class="text-gray-700 pl-2">
                Campos obrigatórios não preenchidos!
            </span>
            <span class="text-2xl flex items-center cursor-pointer" id="close-message-btn">
                <ion-icon name="close-outline"></ion-icon>
            </span>
        </div>
    @endif
</div>
