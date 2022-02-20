<?php

namespace App\Observers;

use App\Models\Appoiment;
use Exception;

class AppoimentObserver
{

    public function saving(Appoiment $appoiment)
    {
    
    }
    /**
     * Handle the Appoiment "created" event.
     *
     * @param  \App\Models\Appoiment  $appoiment
     * @return void
     */
    public function created(Appoiment $appoiment)
    {
        // $examiantion 
        // $appoiment->service->attach();
    }

    /**
     * Handle the Appoiment "updated" event.
     *
     * @param  \App\Models\Appoiment  $appoiment
     * @return void
     */
    public function updated(Appoiment $appoiment)
    {
    }

    /**
     * Handle the Appoiment "deleted" event.
     *
     * @param  \App\Models\Appoiment  $appoiment
     * @return void
     */
    public function deleted(Appoiment $appoiment)
    {
        //
    }

    /**
     * Handle the Appoiment "restored" event.
     *
     * @param  \App\Models\Appoiment  $appoiment
     * @return void
     */
    public function restored(Appoiment $appoiment)
    {
        //
    }

    /**
     * Handle the Appoiment "force deleted" event.
     *
     * @param  \App\Models\Appoiment  $appoiment
     * @return void
     */
    public function forceDeleted(Appoiment $appoiment)
    {
        //
    }
}
