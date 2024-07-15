<?php

namespace Tests\Feature;

use App\Models\Item;
use App\Models\User;
use Tests\TestCase;

class ItemApiTest extends TestCase
{
    protected $user; 

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_can_list_items()
    {
        Item::factory()->count(3)->create();

        $token = auth()->attempt(['email' => $this->user->email, 'password' => 'password']);

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)->get('/api/items');

        $response->assertStatus(200);
    }

    public function test_can_show_item()
    {
        $item = Item::factory()->create();

        $token = auth()->attempt(['email' => $this->user->email, 'password' => 'password']);

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)->get('/api/items/' . $item->id);

        $response->assertStatus(200);
        $response->assertJson(['id' => $item->id]);
    }

    public function test_show_item_not_found()
    {
        $token = auth()->attempt(['email' => $this->user->email, 'password' => 'password']);

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)->get('/api/items/999');

        $response->assertStatus(404);
    }
}
