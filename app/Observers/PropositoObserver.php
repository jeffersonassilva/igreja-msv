<?php

namespace App\Observers;

use App\Helpers\Constants;
use App\Models\Proposito;
use Illuminate\Support\Facades\Cache;

class PropositoObserver
{
    /**
     * @param Proposito $proposito
     * @return void
     */
    public function created(Proposito $proposito)
    {
        //
    }

    /**
     * @param Proposito $proposito
     * @return void
     */
    public function updated(Proposito $proposito)
    {
        Cache::pull(Constants::CACHE_LISTA_PROPOSITOS);
    }

    /**
     * @param Proposito $proposito
     * @return void
     */
    public function deleted(Proposito $proposito)
    {
        //
    }

    /**
     * @param Proposito $proposito
     * @return void
     */
    public function restored(Proposito $proposito)
    {
        //
    }

    /**
     * @param Proposito $proposito
     * @return void
     */
    public function forceDeleted(Proposito $proposito)
    {
        //
    }
}
