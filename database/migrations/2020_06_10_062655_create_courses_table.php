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
            $table->char('id', 36)->primary();
            $table->char("id_category", 36)->index('id_category');
            $table->string("name", 100);
            $table->text("description", 100);
            $table->integer("price");
            $table->integer("discount");
            $table->string("photos", 100);
            $table->tinyInteger("status");
            $table->timestamps();
            $table->foreign('id_category')->references('id')->on('categories');
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
