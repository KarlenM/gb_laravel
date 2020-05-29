<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use \App\Models\User;

class FeedbackTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    // public function testStore()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/feedback')
    //                 ->type('firstname', 'BrowserTest')
    //                 ->type('message', 'BrowserTest BrowserTest BrowserTest BrowserTest BrowserTest')
    //                 ->press('Заказать')
    //                 ->assertPathIs('/feedback');
    //     });
    // }

    public function testDestroy()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                    ->type('email', 'smokdog@me.com')
                    ->type('password', 'KHMw5mx9CHdf9eT')
                    ->press('Войти')
                    ->visit('/admin/feedback')
                    ->click('button[type=submit]')
                    ->assertPathIs('/admin/feedback');
        });
    }
}


// smokdog@me.com
//         KHMw5mx9CHdf9eT