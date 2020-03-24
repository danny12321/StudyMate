<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role');
        });

        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('user_id');

            $table->primary(['role_id', 'user_id']);

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('permission');
        });

        Schema::create('permission_role', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('permission_id');

            $table->primary(['role_id', 'permission_id']);

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('permission_id')->references('id')->on('permissions');
        });

        Schema::create('assessment_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
        });

        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->text('name');
        });

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('coordinator_id');
            $table->unsignedBigInteger('assessment_type');
            $table->decimal('study_points', 4, 1);
            $table->string('path_to_zip')->nullable();
            $table->integer('block');
            $table->timestamp('deadline')->nullable();
            $table->boolean('deadline_done');

            $table->foreign('assessment_type')->references('id')->on('assessment_types');
            $table->foreign('coordinator_id')->references('id')->on('teachers');
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
        });

        Schema::create('course_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('tag_id');

            $table->primary(['course_id', 'tag_id']);

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('tag_id')->references('id')->on('tags');
        });

        Schema::create('course_teacher', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('teacher_id');

            $table->primary(['course_id', 'teacher_id']);

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('user_role');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('role_permission');
        Schema::dropIfExists('assessment_types');
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('course_tag');
        Schema::dropIfExists('course_teacher');
    }
}
