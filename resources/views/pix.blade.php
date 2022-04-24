<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chld=L|0&chl={{$pix}}" alt="QRCode">
<br>

<div class="inline-flex justify-center items-center w-full bg-gray-100 rounded-md p-1">
    <span class="flex justify-center border border-l-0 border-r-1 border-y-0 border-gray-300 px-2 text-2xl">
        <ion-icon name="link-outline"></ion-icon>
    </span>
    <input class="flex-1 border-none bg-gray-100 outline-0 focus:outline-0 ring-0 focus:ring-0 text-sm"
           type="text" value="{{$pix}}" id="qrCode">
    <button class="p-2 rounded-md bg-blue-900 text-white text-sm" onclick="copyQrCode()">Copiar</button>
</div>

<p id="retornoCopyQrCode" class="flex gap-1 items-center mb-3 text-sm">&nbsp;</p>
