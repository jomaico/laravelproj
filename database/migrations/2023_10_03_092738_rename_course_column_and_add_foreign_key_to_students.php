<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCourseColumnAndAddForeignKeyToStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->renameColumn('course', 'course_id');
            $table->unsignedBigInteger('course')->change();
            $table->foreign('course_id')->references('id')->on('course');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
             $table->renameColumn('course_id', 'course');
            $table->dropForeign('course_id');
            $table->dropColumn('course_id');
            //
        });
    }