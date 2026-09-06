<?php

namespace Tests\Feature\Infrastructure;

use Illuminate\Support\Facades\Queue;
use Tests\Fixtures\Jobs\ProbeJob;
use Tests\TestCase;

class QueueDispatchTest extends TestCase
{
    public function test_job_can_be_dispatched_to_queue(): void
    {
        Queue::fake();

        ProbeJob::dispatch();

        Queue::assertPushed(ProbeJob::class);
    }
}
