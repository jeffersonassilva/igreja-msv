<section class="flex justify-center">
    @foreach($banners as $banner)
        <div class="slides {{ $banner['active'] ? 'active' : '' }}">
            <picture class="w-full">
                <source type="image/png" media="(min-width:640px)" srcset="{{ asset($banner['url-web']) }}">
                <img src="{{ asset($banner['url-mobile']) }}" alt="Banner" title="Banner">
            </picture>
        </div>
    @endforeach
</section>

{{--        <img src="{{ asset('img/banner-sm-1.jpg') }}" alt="Banner">--}}

{{--        <section id="main" class="main">--}}
{{--        <div class="slider">--}}
{{--            @foreach($banners as $banner)--}}
{{--                <div class="slides {{ $banner['active'] ? 'active' : '' }}">--}}
{{--                    <img src="{{ asset($banner['url']) }}" alt="Banner">--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        </section>--}}
{{--        <div class="prevNext">--}}
{{--            @foreach($banners as $key => $banner)--}}
{{--                <span class="balls {{ $banner['active'] ? 'active' : '' }}" data-id="{{ $key }}"><ion-icon name="ellipse"></ion-icon></span>--}}
{{--            @endforeach--}}
{{--        </div>--}}

{{--        <section id="main" class="main" style="background-image: url({{ asset('img/banner.png?v=3') }})"></section>--}}


{{--@if(count($banners) === 1)--}}
{{--    @foreach($banners as $key => $banner)--}}
{{--        <div>--}}
{{--            <img src="{{ asset($banner['url']) }}" alt="Banner">--}}
{{--        </div>--}}
{{--        <div class="main-carousel hidden"></div>--}}
{{--    @endforeach--}}
{{--@elseif(count($banners) > 1)--}}
{{--    <section class="main-carousel mb-6 md:mb-4">--}}
{{--        @foreach($banners as $key => $banner)--}}
{{--            <div class="carousel-cell">--}}
{{--                <img src="{{ asset($banner['url']) }}" alt="Banner">--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </section>--}}
{{--@endif--}}

{{-- <section id="main" class="main" style="background-image: url({{ asset('img/banner.jpg?v=3') }})"></section>--}}
