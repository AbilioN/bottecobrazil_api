<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Login extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function setUp(): void
    {
        parent::setUp();

        $this->base_endpoint = route('api.login');

    }

    /** @test */

    public function a_user_can_login()
    {
        $response = $this->get('/');
        
        $response->assertStatus(200);
    }
}
