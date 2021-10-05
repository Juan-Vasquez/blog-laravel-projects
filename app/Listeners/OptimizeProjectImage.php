<?php

namespace App\Listeners;

use App\Events\ProjectSave;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OptimizeProjectImage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectSave  $event
     * @return void
     */
    public function handle(ProjectSave $event)
    {
        $image = Image::make(Storage::get($event->project->image))
            ->widen(600)
            ->encode();

        Storage::put($event->project->image, (string) $image);
    }
}
