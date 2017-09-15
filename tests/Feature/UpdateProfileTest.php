<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateProfileTest extends TestCase
{
    use RefreshDatabase;

    function test_update_user_profile()
    {
        // desactivamos el manejador de excepciones de laravel
        $this->withoutExceptionHandling();

        // creo un usuario por defecto
        $user = factory(User::class)->create();

        // enviamos los datos del perfil del usuario para su creacion
        $this->actingAs($user)
            ->put('profile', [
            'bio' => 'Programador laravel',
            'twitter' => 'GabrielAttila',
            'github' => 'GabrielAttila',
        ])->assertStatus(200);

        // verificamos que el perfil del usuario se registro en la DB
        $this->assertDatabaseHas('profiles', [
            'user_id' => $user->id,
            'bio' => 'Programador laravel',
            'twitter' => 'GabrielAttila',
            'github' => 'GabrielAttila',
        ]);
    }

    function test_twitter_account_validation()
    {
        // desactivamos el manejador de excepciones de laravel
        //$this->withoutExceptionHandling();

        // creo un usuario por defecto
        $user = factory(User::class)->create();

        // enviamos los datos del perfil del usuario para su creacion
        $this->actingAs($user)
            ->put('profile', [
            'bio' => 'Programador laravel',
            'twitter' => '@{}#',
            'github' => 'GabrielAttila',
            // optenemos los errores en sesion
        ])->assertSessionHasErrors(['twitter']);

        // verificamos que el perfil del usuario se registro en la DB
        $this->assertDatabaseMissing('profiles', [
            'user_id' => $user->id,
        ]);
    }
}
