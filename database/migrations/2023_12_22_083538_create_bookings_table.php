<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_customers');
            $table->string('status_booking');
            $table->string('status_pembayaran');
            $table->string('status_order');
            $table->date('booking_date');
            $table->string('booking_time');
            $table->text('bukti_pembayaran')->nullable();
            $table->timestamps();

            $table->foreign('id_customers')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
