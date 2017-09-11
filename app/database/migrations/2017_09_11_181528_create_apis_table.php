<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apis', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string("date")->default("1111-11-11");
            $table->integer('reference')->default(0);
            $table->string('name')->default("-");
            $table->string('speed')->default(0);
            $table->tinyInteger('is_hazardous')->default(0);
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
        Schema::dropIfExists('apis');
    }
}
