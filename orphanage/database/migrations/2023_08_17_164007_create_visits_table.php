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
        Schema::create('visits', function (Blueprint $table) {
            $table->integer('vparent_id',false,true);
            $table->integer('vchild_id',false,true);
            $table->primary(['vchild_id','vparent_id']);
            $table->string('request');
            $table->date('visitDate');
            $table->foreign('vchild_id')->references('C_id')->on('children')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vparent_id')->references('P_id')->on('parents')->onDelete('cascade')->onUpdate('cascade');;
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
        Schema::dropIfExists('visits');
    }
};
