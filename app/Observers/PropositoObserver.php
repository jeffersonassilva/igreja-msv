<?php

namespace App\Observers;

use App\Helpers\Constants;
use Illuminate\Support\Facades\Cache;

class PropositoObserver
{
    /**
     * @return void
     */
    public function created()
    {
        //
    }

    /**
     * @return void
     */
    public function updated()
    {
        Cache::pull(Constants::CACHE_LISTA_PROPOSITOS);
    }

    /**
     * @return void
     */
    public function deleted()
    {
        //
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
