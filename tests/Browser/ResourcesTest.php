<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use \App\Models\User;

class ResourcesTest extends DuskTestCase
{
    public function testStore()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(4))
                    ->visit('/admin')
                    ->clickLink('Ресурсы')
                    ->assertPathIs('/admin/resources')
                    ->clickLink('Добавить ресурс')
                    ->assertPathIs('/admin/resources/create')
                    ->type('name', 'BrowserTesting')
                    ->press('Добавить')
                    ->assertPathIs('/admin/resources')
                    ->assertSee('Ресурс добавлена')
                    ->screenshot('/resources/store');
        });
    }

    public function testUpdate()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(4))
                    ->visit('/admin/resources')
                    ->click('@edit-button')
                    ->append('name', '. Updated.')
                    ->press('Сохранить')
                    ->assertPathIs('/admin/resources')
                    ->assertSee('Ресурс изменен')
                    ->screenshot('/resources/update');
        });
    }

    public function testDestroy()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(4))
                    ->visit('/admin/resources')
                    ->click('@delete-button')
                    ->assertPathIs('/admin/resources')
                    ->assertSee('Ресурс удален')
                    ->screenshot('/resources/destroy');
        });
    }
}
