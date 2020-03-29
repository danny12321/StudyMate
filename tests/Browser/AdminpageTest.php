<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminpageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

     
    public function test_Adminlogin_WithWrongLogin_GivesError()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                    ->type('username', 'maradon67')
                    ->type('password', 'test')
                    ->press('Login')
                    ->assertPathIs('/login');
        });
    }

    public function test_Adminlogin_WithGoodLogin_Works()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                    ->type('username', 'maradon68')
                    ->type('password', 'test')
                    ->press('Login')
                    ->assertPathIs('/admin');
        });
    }

}
