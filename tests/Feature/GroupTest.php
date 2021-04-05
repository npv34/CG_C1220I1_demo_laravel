<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowFormCreateGroup()
    {
        $response = $this->get('/admin/groups/create');

        $response->assertStatus(200);
        $response->assertSee('Thêm mới group');
    }
}
