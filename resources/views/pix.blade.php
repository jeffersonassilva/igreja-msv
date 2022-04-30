<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chld=L|0&chl={{$pix}}" alt="QRCode" class="pb-3">
<div class="inline-flex justify-center items-center w-full bg-white border border-gray-200 rounded-md p-2">
    <span class="flex justify-center border border-l-0 border-r-1 border-y-0 border-gray-300 px-2 text-2xl">
        <ion-icon name="document-text-outline"></ion-icon>
    </span>
    <input class="flex-1 min-w-0 border-none bg-white outline-0 focus:outline-0 ring-0 focus:ring-0 text-sm"
           type="text" value="{{$pix}}" id="qrCode">
    <button class="btnCopy p-2 md:px-4 rounded-md bg-blue-800 hover:bg-blue-900 focus:bg-blue-900 text-white text-sm"
{{--            onclick="copyQrCode()"--}}
            data-clipboard-target="#qrCode"
    >
        Copiar
    </button>
</div>

<p id="messageCopyText" class="flex gap-1 items-center py-1 mb-3 text-sm">&nbsp;</p>
