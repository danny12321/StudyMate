<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeadlinepageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_if_deadlinelogin_gives_error()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/deadline')
                    ->type('username', 'maradon67')
                    ->type('password', 'test')
                    ->press('Login')
                    ->assertPathIs('/login');
        });
    }
    
    public function test_if_deadlinelogin_works()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/deadline')
                    ->type('username', 'frans123')
                    ->type('password', 'test')
                    ->press('Login')
                    ->assertPathIs('/deadline');
        });
    }
}
