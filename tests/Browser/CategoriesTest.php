<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use \App\Models\User;

class CategoriesTest extends DuskTestCase
{

    public function testStore()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(4))
                    ->visit('/admin')
                    ->clickLink('Категории')
                    ->assertPathIs('/admin/categories')
                    ->clickLink('Добавить категорию')
                    ->assertPathIs('/admin/categories/create')
                    ->type('name_cyr', 'Браузер')
                    ->type('name_lat', 'Browser')
                    ->press('Добавить')
                    ->assertPathIs('/admin/categories')
                    ->assertSee('Категория добавлена')
                    ->screenshot('/categories/store');
        });
    }

    public function testUpdate()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(4))
                    ->visit('/admin/categories')
                    ->click('@edit-button')
                    ->append('name_cyr', 'Обнов')
                    ->append('name_lat', 'Updated')
                    ->press('Сохранить')
                    ->assertPathIs('/admin/categories')
                    ->assertSee('Категория изменена')
                    ->screenshot('/categories/update');
        });
    }

    public function testDestroy()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(4))
                    ->visit('/admin/categories')
                    ->click('@delete-button')
                    ->assertPathIs('/admin/categories')
                    ->assertSee('Категория удалена')
                    ->screenshot('/categories/destroy');
        });
    }
}
