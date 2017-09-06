<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HomeTest extends DuskTestCase
{
    /** @test */
    public function it_redirects_to_the_profile_guide()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertRouteIs('guide');
        });
    }
}
