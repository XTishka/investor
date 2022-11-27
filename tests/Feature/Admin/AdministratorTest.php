<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AdministratorTest extends TestCase
{
    public function test_auth_protection()
    {
        $response = $this->get('/admin/administrators');
        $response->assertRedirect('/login');
    }

    public function test_render_index_page()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/admin/administrators');

        $response->assertOk();
    }

    public function test_render_create_page()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/admin/administrators/create');

        $response->assertOk();
    }

    public function test_administrator_can_be_created()
    {
        $response = $this->post('/admin/administrators/create', []);
    }
}