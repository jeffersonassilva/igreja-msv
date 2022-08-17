<?php

namespace App\Observers;

use App\Helpers\Constants;
use App\Models\Pastor;
use Illuminate\Support\Facades\Cache;

class PastorObserver
{
    /**
     * @param Pastor $pastor
     * @return void
     */
    public function created(Pastor $pastor)
    {
        //
    }

    /**
     * @param Pastor $pastor
     * @return void
     */
    public function updated(Pastor $pastor)
    {
        Cache::pull(Constants::CACHE_LISTA_PASTORES);
    }

    /**
     * @param Pastor $pastor
     * @return void
     */
    public function deleted(Pastor $pastor)
    {
        //
    }

    /**
     * @param Pastor $pastor
     * @return void
     */
    public function restored(Pastor $pastor)
    {
        //
    }

    /**
     * @param Pastor $pastor
     * @return void
     */
    public function forceDeleted(Pastor $pastor)
    {
        //
    }
}
