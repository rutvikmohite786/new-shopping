<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
class ProductAddTest extends TestCase
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
        $response = $this->post('/product/store', 
        ['name' => 'mi 9',
        'subcategory'=>27])->assertRedirect('/product');
        $response->assertStatus(302);
    }
}
