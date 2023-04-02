<?php

namespace Tests\Feature\Employee;

use Tests\TestCase;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_create_employee_page()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $employee = Employee::factory()->create();
        $response = $this->actingAs($admin)->get('/employee/create/');

        $response->assertStatus(200);
    }

    public function test_user_can_store_new_employee()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $response = $this->actingAs($admin)->post('/employee/create', [
            'fullname' => 'Rick Jones',
            'email' => 'rjones@gmail.com',
            'gender' => 'male',
            'phone' => '744659559',
            'address' => '5595 Golden Knoll',
            'zip_code' => '8525',
            'employment_date' => '2022-03-07',
        ]);

        $response->assertSessionHasNoErrors();  
        $response->assertRedirect('/employees');
        $this->assertCount(1, Employee::all());
        $this->assertDatabaseHas('employees', [
            'fullname' => 'Rick Jones',
            'email' => 'rjones@gmail.com',
            'gender' => 'male',
            'phone' => '744659559',
            'address' => '5595 Golden Knoll',
            'zip_code' => '8525',
            'employment_date' => '2022-03-07',
        ]);
    }

    public function test_user_can_see_show_employee_page()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $employee = Employee::factory()->create();
        $response = $this->actingAs($admin)->get('/employee/show/'. $employee->id);

        $response->assertStatus(200);
        $response->assertSee($employee->fullname);
    }
    
    public function test_user_can_see_edit_employee_page()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $employee = Employee::factory()->create();
        $response = $this->actingAs($admin)->get('/employee/edit/'. $employee->id);

        $response->assertStatus(200);
        $response->assertSee($employee->fullname);
    }

    public function test_user_can_update_employee()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        Employee::factory()->create();
        $this->assertCount(1, Employee::all());
        $employee = Employee::first();
        $response = $this->actingAs($admin)->post('/employee/update/'. $employee->id, [
            'fullname' => 'Rick Jones',
            'email' => 'rjones@gmail.com',
            'gender' => 'male',
            'phone' => '744659559',
            'address' => '5595 Golden Red',
            'zip_code' => '8525',
            'employment_date' => '2022-03-07',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/employees');
        
        $this->assertEquals('Rick Jones', Employee::first()->fullname);
        $this->assertEquals('rjones@gmail.com', Employee::first()->email);
        $this->assertEquals('male', Employee::first()->gender);
        $this->assertEquals('744659559', Employee::first()->phone);
        $this->assertEquals('5595 Golden Red', Employee::first()->address);
        $this->assertEquals('8525', Employee::first()->zip_code);
        $this->assertEquals('2022-03-07', Employee::first()->employment_date);
    }

    public function test_user_can_delete_employee()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $employee = Employee::factory()->create();
        $this->assertEquals(1, Employee::count());
        $response = $this->actingAs($admin)->post('/employee/delete/'. $employee->id);

        $response->assertStatus(302);
        $this->assertEquals(0, Employee::count());
    }
}
