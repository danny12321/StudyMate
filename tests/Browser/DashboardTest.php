<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DashboardTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_if_progressmeter_renders()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Voortgangsmeter');
        });
    }

    public function test_if_dashboardpage_shows()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Dashboard');
        });
    }
}
