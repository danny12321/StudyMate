<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Teacher;

class TeacherTest extends TestCase
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
        $teacher = new Teacher();
        $name = 'Harry';

        // act
        $teacher->name = $name;

        // assert
        $this->assertEquals($name, $teacher->name);
    }

    public function testWhen_TeacherName_Expect_EncryptedName()
    {
        // arrange
        $teacher = new Teacher();
        $name = 'Harry';

        // act
        $teacher->name = $name;

        // assert
        $this->assertNotEquals($name, $teacher->getAttributes()['name']);
    }
}
