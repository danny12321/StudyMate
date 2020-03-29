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
    public function test_Progressmeter_Renders()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Voortgangsmeter');
        });
    }

    public function test_Dashboardpage_Shows()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Dashboard');
        });
    }
}
