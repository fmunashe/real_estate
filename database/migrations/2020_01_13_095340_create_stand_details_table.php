<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stand_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client_id');
            $table->integer('stand_id');
            $table->float('price');
            $table->float('armotisation');
            $table->float('mortgage_protection')->nullable();
            $table->float('monthly_installment');
            $table->date('com_date');
            $table->string('name');
            $table->string('relationship');
            $table->string('address');
            $table->string('phone');
            $table->integer('status')->default(0);
            $table->float('balance')->default(0);
            $table->float('amount_paid')->default(0);
            $table->string('attachment');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->integer('is_deleted')->default(0);
            $table->timestamps();

            $table->index('client_id');
            $table->index('stand_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stand_details');
    }
}
