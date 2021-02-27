<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testBasicTest()
    {
        $this->assertTrue(true);
        // $response = $this->select('name')->first();
        // return $response;
        // $user = new User();
        // $response = $user->selectUser();
        // $this->assertSame('rezept', $response['name']);
    }
}
