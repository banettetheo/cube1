<?php

namespace Tests\Feature\Ressource;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class RessourceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_toute_les_ressources_sont_recuperees()
    {
        $response = $this->getJson('/api/ressources'); 
        $response->assertStatus(404);
    
    }
}
