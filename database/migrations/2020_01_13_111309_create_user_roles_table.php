<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('role_id');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->integer('is_deleted')->default(0);
            $table->timestamps();

            $table->index('user_id');
            $table->index('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roles');
    }
}
