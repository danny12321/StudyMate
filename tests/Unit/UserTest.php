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
    public function testWhen_TeacherInputName_Expect_OutputName()
    {
        // arrange
        $teacher = new User();
        $name = 'Harry';

        // act
        $teacher->name = $name;

        // assert
        $this->assertEquals($name, $teacher->name);
    }

    public function testWhen_TeacherName_Expect_EncryptedName()
    {
        // arrange
        $teacher = new User();
        $name = 'Harry';

        // act
        $teacher->name = $name;

        // assert
        $this->assertNotEquals($name, $teacher->getAttributes()['name']);
    }
}
