<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use \App\Models\User;

class AuthTest extends DuskTestCase
{
    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                    ->type('email', 'smokdog@me.com')
                    ->type('password', 'KHMw5mx9CHdf9eT')
                    ->press('Войти')
                    ->assertPathIs('/admin');
        });
    }
}
