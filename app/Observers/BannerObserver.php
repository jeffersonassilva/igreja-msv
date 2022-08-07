<?php

namespace App\Observers;

use App\Helpers\Constants;
use App\Models\Banner;
use Illuminate\Support\Facades\Cache;

class BannerObserver
{
    /**
     * @param Banner $banner
     * @return void
     */
    public function created(Banner $banner)
    {
        Cache::pull(Constants::CACHE_LISTA_BANNERS);
    }

    /**
     * @param Banner $banner
     * @return void
     */
    public function updated(Banner $banner)
    {
        Cache::pull(Constants::CACHE_LISTA_BANNERS);
    }

    /**
     * @param Banner $banner
     * @return void
     */
    public function deleted(Banner $banner)
    {
        Cache::pull(Constants::CACHE_LISTA_BANNERS);
    }

    /**
     * @param Banner $banner
     * @return void
     */
    public function restored(Banner $banner)
    {
        //
    }

    /**
     * @param Banner $banner
     * @return void
     */
    public function forceDeleted(Banner $banner)
    {
        //
    }
}
