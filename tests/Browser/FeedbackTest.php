<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use \App\Models\User;

class FeedbackTest extends DuskTestCase
{
    public function testStore()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/feedback')
                    ->type('firstname', 'BrowserTest')
                    ->type('message', 'BrowserTest BrowserTest BrowserTest BrowserTest BrowserTest')
                    ->press('Заказать')
                    ->assertPathIs('/feedback')
                    ->assertSee('Обратная связь заказана, скоро с вами свяжустся')
                    ->screenshot('/feedback/store');
        });
    }

    public function testUpdate()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(4))
                    ->visit('/admin')
                    ->clickLink('Обратная связь')
                    ->assertPathIs('/admin/feedback')
                    ->click('@edit-button')
                    ->type('firstname', 'BrowserTest')
                    ->append('message', '. Addition text test.')
                    ->press('Сохранить')
                    ->assertPathIs('/admin/feedback')
                    ->assertSee('Обратная связь изменена')
                    ->screenshot('/feedback/update');
        });
    }

    public function testDestroy()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(4))
                    ->visit('/admin')
                    ->clickLink('Обратная связь')
                    ->assertPathIs('/admin/feedback')
                    ->click('@delete-button')
                    ->assertPathIs('/admin/feedback')
                    ->assertSee('Обратная связь удалена')
                    ->screenshot('/feedback/destroy');
        });
    }
}