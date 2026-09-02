<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function test_home_page_is_available(): void
    {
        $this->get('/')->assertOk()->assertSee('Boletim da Captação');
    }
}
