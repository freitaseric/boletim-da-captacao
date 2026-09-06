<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApplicationSmokeTest extends TestCase
{
    public function test_home_page_is_available(): void
    {
        $this->get('/')->assertOk()->assertSee('Boletim da Captação');
    }

    public function test_admin_dashboard_redirects_guests_to_login(): void
    {
        $this->get(route('admin.dashboard'))
            ->assertRedirect(route('login'));
    }
}
