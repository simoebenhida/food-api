<?php

namespace Tests\Feature;

use App\Http\Resources\Users;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function example_test()
    {
        $user = factory('App\User')->create();
        $array = [
            'name' => 'John Doe',
            'password' => 'secret'
        ];
        $merged = array_merge($array, [
            'password' => bcrypt('secret')
        ]);
        dd($merged);
        // $resource = Users::collection($user);
        dd(User::find($user->id)->toArray());
        $this->assertTrue(true);
    }
}
