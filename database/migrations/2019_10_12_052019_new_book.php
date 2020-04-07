<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->increments('b_id');
            $table->bigInteger('Topartyno');
            $table->string('Toname');
            $table->String('Tobranch');
            $table->string('togst')->nullable();
            $table->string('ewaybill')->nullable();

            $table->bigInteger('From_Contact_No');
            $table->char('From_Name');
            $table->string('Frombranch')->nullable();
            $table->string('fromgst')->nullable();
            $table->char('sugg')->nullable();

            $table->bigInteger('Total_Quantity')->nullable()->default(12);
            $table->String('Luggage_details')->nullable();
            $table->bigInteger('Rate');
            $table->bigInteger('Door_Pickup')->nullable();
            $table->bigInteger('Door_Delivery')->nullable();

            $table->String('Book_Receipt')->nullable();
            $table->String('dofissue')->nullable();
            $table->String('Payment_Mode');
            $table->String('togstamount')->nullable();
            $table->bigInteger('netpay');
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
        Schema::dropIfExists('book');
    }
}
