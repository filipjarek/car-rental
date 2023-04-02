<?php

namespace Tests\Feature\Employee;

use Tests\TestCase;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function test_employees_page_works()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $response = $this->actingAs($admin)->get('/employees');

        $response->assertStatus(200);
    }

    public function test_employee_table_have_records()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $response = $this->actingAs($admin)->get('/employees');
        $employee = Employee::factory()->create();
        
        $this->assertNotEmpty($employee->fullname);
    }

    public function test_employees_table_is_empty()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $response = $this->actingAs($admin)->get('/employees');

        $response->assertSee('No Employees');
    }
}
