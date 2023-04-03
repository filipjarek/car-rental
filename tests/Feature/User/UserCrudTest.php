<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_see_show_user_page()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create();
        $response = $this->actingAs($admin)->get('/user/show/'. $user->id);

        $response->assertStatus(200);
        $response->assertSee($user->email);
    }
    
    public function test_admin_can_see_edit_user_page()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create();
        $response = $this->actingAs($admin)->get('/user/edit/'. $user->id);

        $response->assertStatus(200);
        $response->assertSee($user->email);
    }

    public function test_admin_can_update_user()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        User::factory()->create();
        $this->assertCount(2, User::all());
        $user = User::first();
        $response = $this->actingAs($admin)->post('/user/update/'. $user->id, [
            'employee_id' => '',
            'name' => 'rjones',
            'email' => 'rjones@gmail.com',
            'role' => 'user'
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/users');
        
        $this->assertEquals('', User::first()->employee_id);
        $this->assertEquals('rjones', User::first()->name);
        $this->assertEquals('rjones@gmail.com', User::first()->email);
        $this->assertEquals('user', User::first()->role);
    }

    public function test_admin_can_delete_user()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create();
        $this->assertEquals(2, User::count());
        $response = $this->actingAs($admin)->post('/user/delete/'. $user->id);

        $response->assertStatus(302);
        $this->assertEquals(1, User::count());
    }
}
