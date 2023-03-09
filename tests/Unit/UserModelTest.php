<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserModelTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_User_Letezik()
    {
        $this->setName("Létezik-e a User osztály?");
        $this->assertTrue(class_exists("App\Models\User"), "A User osztály nem létezik");
    }

    public function test_User_Mukodik()
    {
        $this->setName("User osztály mezői elérhetőek-e?");

        $user = User::get()[0];
        $this->assertIsString($user->name);
        
    }

    public function test_User_NevStimmel()
    {
        $this->setName("Első User neve Kottra Richárd?");

        $user = User::get()[0];
        $this->assertEquals($user->name, "Kottra Richárd");
        
    }
}
