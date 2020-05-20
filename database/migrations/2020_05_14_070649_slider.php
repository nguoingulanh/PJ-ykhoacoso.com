<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Slider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('slider', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sliders_title');
            $table->string('sliders_url')->nullable();
            $table->string('sliders_image');
            $table->enum('is_publish',[1,0])->default(true);
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
        //
        Schema::dropIfExists('slider');
    }
}
