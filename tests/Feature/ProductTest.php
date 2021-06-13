<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        $this->fake_product = factory(Product::class)->create();
    }
    /** @test */
    public function products_can_be_listed()
    {
        $response = $this->get(route('api.products.show'));
        $response->assertStatus(200);        
    }
}
