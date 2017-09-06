<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    /** @test */
    public function it_redirects_to_the_profile_guide()
    {
        $response = $this->get('/');

        $response->assertRedirect(route('guide'));
    }
}
