<?php

namespace Tests\Unit;

use App\Profile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;
    // verificar si puede generar url de twitter
    function test_it_can_generate_twitter_urls()
    {
        // creamos un perfil
        $profile = factory(Profile::class)->create([
            'twitter' => 'GabrielAttila'
        ]);

        $this->assertSame('https://twitter.com/GabrielAttila', $profile->twitter_url);
    }
}
