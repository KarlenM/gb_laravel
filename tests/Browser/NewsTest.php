<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use \App\Models\User;

class NewsTest extends DuskTestCase
{
    public function testStore()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(4))
                    ->visit('/admin')
                    ->clickLink('Новости')
                    ->assertPathIs('/admin/news')
                    ->clickLink('Добавить новость')
                    ->assertPathIs('/admin/news/create')
                    ->type('title', 'BrowserTest')
                    ->type('author', 'BrowserTest')
                    ->select('category_id')
                    ->select('resource_id')
                    ->attach('img', __DIR__.'/images/test.png')
                    ->type('text', 'BrowserTest BrowserTest BrowserTest BrowserTest BrowserTest')
                    ->press('Добавить')
                    ->assertPathIs('/admin/news')
                    ->assertSee('Новость добавлена')
                    ->screenshot('/news/store');
        });
    }

    public function testUpdate()
    {
        $this->browse(function (Browser $browser) {

            $browser->loginAs(User::find(4))
                    ->visit('/admin/news')
                    ->click('@edit-button')
                    ->append('title', '. Updated')
                    ->append('author', '. Updated')
                    ->select('category_id')
                    ->select('resource_id')
                    ->attach('img', __DIR__.'/images/test.png')
                    ->append('text', '. Updated')
                    ->press('Сохранить')
                    ->assertPathIs('/admin/news')
                    ->assertSee('Новость изменена')
                    ->screenshot('/news/update');
        });
    }

    public function testDestroy()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(4))
                    ->visit('/admin/news')
                    ->click('@delete-button')
                    ->assertPathIs('/admin/news')
                    ->assertSee('Новость удалена')
                    ->screenshot('/news/destroy');
        });
    }
}
