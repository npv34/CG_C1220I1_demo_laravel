<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowFormCreateUser()
    {
        $response = $this->get('/admin/users/create');

        $response->assertStatus(200);
        $response->assertViewIs('admin.users.add');
    }

    public function testCreateUser()
    {
        $data = [
            'name' => 'Dao',
            'email' => 'dao@gmail.com',
            'password' => '1234567',
            'group_id' => 1,
            'image'=> '...'
        ];
        $response = $this->post('/admin/users/create', $data);
        $response = $this->get('/admin/users');
        $response->assertStatus(200);
        $response->assertSeeText('dao@gmail.com');



    }
}
