<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('link');
            $table->unsignedBigInteger('technology_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('format_id');
            $table->unsignedBigInteger('version_id');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('level_id');
            $table->boolean('approved')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
