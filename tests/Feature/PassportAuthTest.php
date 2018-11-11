<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PassportAuthTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        $this->artisan('passport:install');
    }

    /** @test */
    public function can_log_in()
    {
        $user = factory('App\User')->create();

        $response = $this->post(route('login'), [
                "email" => $user->email,
                "password" => 'secret'
        ]);

        $response->assertSuccessful()
            ->assertSee('token')
            ->assertJsonFragment([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ]);
    }

    /** @test */
    public function can_register()
    {
        $this->assertEquals(0, \App\User::count());

        $response = $this->post(route('register'), [
                "name" => 'Mohamed Benhida',
                "email" => 'email@email.com',
                "password" => 'secret',
                "confirmed_password" => 'secret'
        ]);

        $response->assertSuccessful()
            ->assertSee('token')
            ->assertJsonFragment([
                'name' => 'Mohamed Benhida',
                'email' => 'email@email.com',
            ]);

        $this->assertEquals(1, \App\User::count());

        $this->assertDatabaseHas('users', [
            'name' => 'Mohamed Benhida',
            'email' => 'email@email.com',
        ]);
    }

    /** @test */
    public function is_logged_in()
    {
        $user = factory('App\User')->create();

        $this->actingAs($user);

        $this->assertAuthenticated(); //default guard api
        $this->assertAuthenticatedAs($user); //default guard api
    }

}
