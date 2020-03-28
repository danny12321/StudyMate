<?php

namespace Tests\Unit;

use App\Teacher;
use PHPUnit\Framework\TestCase;

class TeacherTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_Teacher_InputName_IsEqual_OutputName()
    {
        // arrange
        $teacher = new Teacher();
        $name = 'Harry';

        // act
        $teacher->name = $name;

        // assert
        $this->assertEquals($name, $teacher->name);
    }

    public function testTeacherNameIsEcrypted()
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
