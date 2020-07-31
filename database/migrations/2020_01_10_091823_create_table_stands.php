<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableStands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('stand_number');
            $table->integer('size')->nullable();
            $table->integer('location_id');
            $table->integer('status')->default(0);
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->integer('is_deleted')->default(0);
            $table->timestamps();

            $table->index('location_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        Schema::dropIfExists('stands');
    }
}
