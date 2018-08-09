<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ClientsPageTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function clients_vue_component_has_a_list_of_clients()
    {
        $this->browse(function (Browser $browser) {
            $clients = factory(Client::class, 3)->create();
            $browser->loginAs($this->createUser())
                ->visit(new ClientsPage)
                ->assertVue('clients', $clients->toArray(), '@clients-component');
        });
    }
}
