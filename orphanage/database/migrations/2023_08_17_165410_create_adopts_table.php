<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adopts', function (Blueprint $table) {
            $table->integer('achild_id',false,true);
            $table->integer('aparent_id',false,true);
            $table->date('adoptionDate');
            $table->foreign('achild_id')->references('C_id')->on('children')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('aparent_id')->references('P_id')->on('parents')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['achild_id','aparent_id']);
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
        Schema::dropIfExists('adopts');
    }
};
