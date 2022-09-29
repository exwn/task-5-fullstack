<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function user_can_be_register()
    {
        // $this->withoutExceptionHandling();

        $userData = [
            "name" => $this->faker->name(),
            "email" => $this->faker->email(),
            "password" => "password"
        ];
        $response = $this->json('POST', '/api/v1/register', $userData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure(['token']);
        $this->assertArrayHasKey('token', $response->json());
    }

    /**
     * @test
     */

    public function user_can_be_login()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->json('POST', '/api/v1/login', [
            'email' => $user->email,
            'password' => 'password',
        ], ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure(['token']);
    }
}
