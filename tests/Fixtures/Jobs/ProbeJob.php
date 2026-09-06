<?php

namespace Tests\Fixtures\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProbeJob implements ShouldQueue
{
    use Queueable;

    public function handle(): void
    {
        // Intentionally empty.
    }
}
