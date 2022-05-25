<section class="w-full slider mx-auto bg-gray-100">
    @foreach($banners as $banner)
        <div class="slides {{ $banner['active'] ? 'active' : '' }}">
            <picture class="w-full">
                <source type="image/png" media="(min-width:640px)" srcset="{{ asset($banner['url-web']) }}">
                <img src="{{ asset($banner['url-mobile']) }}" alt="Banner">
            </picture>
        </div>
    @endforeach
</section>
<section class="flex items-center justify-center mt-2">
    @foreach($banners as $key => $banner)
        <span class="balls text-gray-300 text-xs 2xl:text-base p-1 cursor-pointer {{ $banner['active'] ? 'active' : '' }}" data-id="{{ $key }}">
            <ion-icon name="ellipse"></ion-icon>
        </span>
    @endforeach
</section>
