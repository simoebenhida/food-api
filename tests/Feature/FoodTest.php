<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class FoodTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function store_food()
    {
        $this->withoutExceptionHandling();
        $user = factory('App\User')->create();

        $this->actingAs($user);

        $response = $this->post(route('food.store'), [
            'title' => 'Food Title',
            'image' => 'Image',
            'description' => 'Long Text',
            'price' => 10,
        ]);

        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJsonFragment([
                'title' => 'Food Title',
                'image' => 'Image',
                'description' => 'Long Text',
                'price' => 10,
                'author' => [
                    'name' => $user->name
                ]
            ]);
    }

    /** @test */
    public function index_food()
    {
        $this->assertTrue(true);
    }
}
