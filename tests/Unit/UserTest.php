<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testWhen_UserInputName_Expect_OutputName()
    {
        // arrange
        $user = new User();
        $name = 'Age';

        // act
        $user->name = $name;

        // assert
        $this->assertEquals($name, $user->name);
    }

    public function testWhen_UserName_Expect_EncryptedName()
    {
        // arrange
        $user = new User();
        $name = 'Age';

        // act
        $user->name = $name;

        // assert
        $this->assertNotEquals($name, $user->getAttributes()['name']);
    }
}
