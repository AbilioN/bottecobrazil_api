<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Product extends TestCase
{

    /** @test */
    public function products_can_be_listed()
    {
        $response = $this->get(route('api.products.list'));
        $response->assertStatus(200);        
    }
}
