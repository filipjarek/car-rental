<?php

namespace Tests\Feature\Company;

use Tests\TestCase;
use App\Models\User;
use App\Models\Company;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    public function test_company_page_works()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $response = $this->actingAs($admin)->get('/company');

        $response->assertStatus(200);
    }

    public function test_company_table_have_records()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $response = $this->actingAs($admin)->get('/company');
        $company = Company::factory()->create();
        
        $this->assertNotEmpty($company->name);
    }

    public function test_company_table_is_empty()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $response = $this->actingAs($admin)->get('/company');

        $response->assertSee('No Company');
    }
}
