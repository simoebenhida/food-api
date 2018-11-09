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
    public function is_logged_in()
    {
        $this->withoutExceptionHandling();

        $user = factory('App\User')->create();

        $response = $this->post('api/login', [
            "email" => $user->email,
            "password" => 'secret'
        ]);

        $response->assertSuccessful();
        $response->assertSee('token');
        $response->assertJsonCount(7,'user');
    }
}
