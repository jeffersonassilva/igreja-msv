<?php

namespace App\Observers;

use App\Helpers\Constants;
use Illuminate\Support\Facades\Cache;

class BannerObserver
{
    /**
     * @return void
     */
    public function created()
    {
        Cache::pull(Constants::CACHE_LISTA_BANNERS);
    }

    /**
     * @return void
     */
    public function updated()
    {
        Cache::pull(Constants::CACHE_LISTA_BANNERS);
    }

    /**
     * @return void
     */
    public function deleted()
    {
        Cache::pull(Constants::CACHE_LISTA_BANNERS);
    }

    /**
     * @return void
     */
    public function restored()
    {
        //
    }

    /**
     * @return void
     */
    public function forceDeleted()
    {
        //
    }
}
