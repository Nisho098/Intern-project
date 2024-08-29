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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            //$table->integer('capacity')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('available')->default(true);
            
            $table->unsignedBigInteger("room_category_id");
            $table->foreign("room_category_id")->references('id')->on ('room_categories');
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
        Schema::dropIfExists('rooms');
    }
};
