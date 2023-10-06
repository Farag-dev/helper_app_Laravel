<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->integer("User_id");
            $table->string("image1");
            $table->string("image2")->nullable();
            $table->string("image3")->nullable();
            $table->text("description");
            $table->integer("budget");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('works');
    }
};
