<?php

namespace Tests\Feature\Company;

use Tests\TestCase;
use App\Models\User;
use App\Models\Company;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_create_company_page()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $company = Company::factory()->create();
        $response = $this->actingAs($admin)->get('/company/create/');

        $response->assertStatus(200);
    }

    public function test_user_can_store_new_company()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $response = $this->actingAs($admin)->post('/company/create', [
            'name' => 'Budget Car Rental',
            'NIP' => '7973414959',
            'phone' => '744632559',
            'street' => 'Auer Loaf',
            'zip_code' => '11212',
            'city' => 'Marleybergv',
            'bank_number' => 'PL63856205705883616476851298',
        ]);

        $response->assertSessionHasNoErrors();  
        $response->assertRedirect('/company');
        $this->assertCount(1, Company::all());
        $this->assertDatabaseHas('companies', [
            'name' => 'Budget Car Rental',
            'NIP' => '7973414959',
            'phone' => '744632559',
            'street' => 'Auer Loaf',
            'zip_code' => '11212',
            'city' => 'Marleybergv',
            'bank_number' => 'PL63856205705883616476851298',
        ]);
    }

    public function test_user_can_see_show_company_page()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $company = Company::factory()->create();
        $response = $this->actingAs($admin)->get('/company/show/'. $company->id);

        $response->assertStatus(200);
        $response->assertSee($company->name);
    }
    
    public function test_user_can_see_edit_company_page()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $company = Company::factory()->create();
        $response = $this->actingAs($admin)->get('/company/edit/'. $company->id);

        $response->assertStatus(200);
        $response->assertSee($company->name);
    }

    public function test_user_can_update_company()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        Company::factory()->create();
        $this->assertCount(1, Company::all());
        $company = Company::first();
        $response = $this->actingAs($admin)->post('/company/update/'. $company->id, [
            'name' => 'Budget Car Rental',
            'NIP' => '7973414959',
            'phone' => '744632559',
            'street' => 'Loaf Ding',
            'zip_code' => '6523',
            'city' => 'Marleybergv',
            'bank_number' => 'PL63856205705883616476851298',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/company');
        
        $this->assertEquals('Budget Car Rental', Company::first()->name);
        $this->assertEquals('7973414959', Company::first()->NIP);
        $this->assertEquals('744632559', Company::first()->phone);
        $this->assertEquals('Loaf Ding', Company::first()->street);
        $this->assertEquals('6523', Company::first()->zip_code);
        $this->assertEquals('Marleybergv', Company::first()->city);
        $this->assertEquals('PL63856205705883616476851298', Company::first()->bank_number);
    }

    public function test_user_can_delete_company()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $company = Company::factory()->create();
        $this->assertEquals(1, Company::count());
        $response = $this->actingAs($admin)->post('/company/delete/'. $company->id);

        $response->assertStatus(302);
        $this->assertEquals(0, Company::count());
    }
}
