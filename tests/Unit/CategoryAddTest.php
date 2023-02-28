<?php

namespace Tests\Unit;
use App\Models\User;
use Tests\TestCase;

class CategoryAddTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
         //use for authentication
         $this->actingAs(User::find(1));
         $response = $this->post('/category/store', 
         ['name' => 'online',
         'subcategory'=>27])->assertRedirect('/category');
         $response->assertStatus(302);
    }
}
