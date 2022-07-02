@if($banners->count())
    <section class="w-full slider mx-auto bg-gray-100">
        @foreach($banners as $key => $banner)
            <div class="slides {{ $key === 0 ? 'active' : '' }}">
                @if($banner['link'])
                    <a href="{{ $banner['link'] }}" @if(str_contains($banner['link'], 'http')) target="_blank" rel="noopener noreferrer" @endif class="outline-0">
                        <picture class="w-full">
                            <source type="image/png" media="(min-width:640px)" srcset="{{ asset($banner['img_web']) }}">
                            <img src="{{ asset($banner['img_mobile']) }}" alt="Banner">
                        </picture>
                    </a>
                @else
                    <picture class="w-full">
                        <source type="image/png" media="(min-width:640px)" srcset="{{ asset($banner['img_web']) }}">
                        <img src="{{ asset($banner['img_mobile']) }}" alt="Banner">
                    </picture>
                @endif
            </div>
        @endforeach
    </section>
@endif
@if(count($banners) > 1)
    <section class="flex items-center justify-center mt-2">
        @foreach($banners as $key => $banner)
            <span class="balls text-gray-300 text-xs 2xl:text-base p-1 cursor-pointer {{ $key === 0 ? 'active' : '' }}"
                  data-id="{{ $key }}">
            <ion-icon name="ellipse"></ion-icon>
        </span>
        @endforeach
    </section>
@endif
