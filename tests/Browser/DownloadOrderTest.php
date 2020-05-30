<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use \App\Models\User;

class DownloadOrderTest extends DuskTestCase
{
    public function testStore()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/download-order')
                    ->type('firstname', 'BrowserTest')
                    ->type('tel', '89219999999')
                    ->type('email', 'smokdog@me.com')
                    ->type('message', 'BrowserTest BrowserTest BrowserTest BrowserTest BrowserTest')
                    ->press('Заказать')
                    ->assertPathIs('/download-order')
                    ->assertSee('Заказ создан')
                    ->screenshot('/download-order/store');
        });
    }

    public function testUpdate()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(4))
                    ->visit('/admin')
                    ->clickLink('Заказ выгрузки')
                    ->assertPathIs('/admin/download-order')
                    ->click('@edit-button')
                    ->append('firstname', 'BrowserUpdated')
                    ->append('tel', '892199999995')
                    ->append('email', '.ru')
                    ->append('message', '. Updated.')
                    ->press('Сохранить')
                    ->assertPathIs('/admin/download-order')
                    ->assertSee('Заказ выгрузки изменен')
                    ->screenshot('/download-order/update');
        });
    }

    public function testDestroy()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(4))
                    ->visit('/admin/download-order')
                    ->screenshot('/feedback/destroy')
                    ->click('@delete-button')
                    ->assertPathIs('/admin/download-order')
                    ->assertSee('Заказ выгрузки удален')
                    ->screenshot('/download-order/destroy');
        });
    }
}
