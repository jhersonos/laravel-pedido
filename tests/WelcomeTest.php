<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WelcomeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_welcome_a_guest_user()
    {
	    $user = new \App\User(['name' => 'Jherson']);
	 
	    auth()->login($user);
	 
	    $this->assertSame(welcome(), 'Welcome Jherson!');
    }
}
