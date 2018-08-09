<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FirstUITest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://homol.logcomex.io/#/signin')
                ->type('input[type=email]', 'eduardo@logcomex.com')
                ->type('input[type=password]', 'underground')
                ->press('Entrar')
                ->waitFor('#app');
            dd($browser->driver->executeScript('return document.querySelector("#app").__vue__.$route.name'));
            $browser->storeConsoleLog('thisconsolelog');
//
//                    ->type('input[type=email]', 'eduardo@logcomex.com')
//                    ->type('input[type=password]', 'underground')
//                    ->press('Entrar')
//                    ->waitFor('#app', 4)
//                    ->assertVue('showDetails.pivotRoute', 'api/inteligencia/big-data/pivot', '@intelligenceImport');
        });
    }
}
