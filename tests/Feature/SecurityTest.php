<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class SecurityTest extends TestCase
{
    use RefreshDatabase;
    public function test_regular_user_cannot_access_admin_routes()
    {
        $user = User::factory()->create(['is_admin' => false]);
        $token = $user->createToken('test_token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->getJson('/api/admin/products');

        $response->assertStatus(403);
        $response->assertJson(['message' => 'Unauthorized. Admin access required.']);
    }

    public function test_admin_user_can_access_admin_routes()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $token = $admin->createToken('test_token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->getJson('/api/admin/products');

        $response->assertStatus(200);
    }
}
