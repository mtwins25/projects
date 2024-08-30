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
        Schema::create('supervises', function (Blueprint $table) {
            $table->integer('schild_id',false,true);
            $table->integer('sSuper_id',false,true);
            $table->foreign('schild_id')->references('C_id')->on('children')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sSuper_id')->references('S_id')->on('supervisors')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['schild_id','sSuper_id']);
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
        Schema::dropIfExists('supervises');
    }
};
