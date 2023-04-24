<?php

namespace Tests\Feature\API\V0;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use App\Models\User;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_login_should_return_a_token_when_email_and_password_match(): void
    {
        $user = User::create([
            'name' => 'aname',
            'email' => 'anemail',
            'password' => bcrypt('apassword')
        ]);
        
        $response = $this->postJson('/api/v0/login', ['email' => 'anemail', 'password' => 'apassword']);

        $response->assertStatus(200);

        $response->assertJson(function(AssertableJson $json) {
            $json->hasAll('accessToken', 'plainTextToken');
            $json->whereType('plainTextToken', 'string');
        });
    }

    public function test_login_should_not_return_a_token_when_email_and_or_password_do_not_match(): void
    {
        $user = User::create([
            'name' => 'aname',
            'email' => 'anemail',
            'password' => bcrypt('apassword')
        ]);
        
        $response = $this->postJson('/api/v0/login', ['email' => 'teste', 'password' => 'apassword']);

        $response->assertStatus(401);
    }
}
