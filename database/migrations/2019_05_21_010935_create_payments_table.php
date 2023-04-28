<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('hash');
            $table->unsignedBigInteger('site_id')->index();
            $table->unsignedBigInteger('order_id');
            $table->decimal('total_amount', 12, 6);
            $table->decimal('payment_amount', 12, 6);
            $table->string('payment_type');
            $table->string('currency');
            $table->unsignedTinyInteger('test_mode')->default(0);

            $table->string('name');
            $table->string('email');
            $table->char('phone', 10)->nullable();
            $table->string('tc_no')->nullable();
            $table->ipAddress('ip_address');

            $table->json('response');
            
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
        Schema::dropIfExists('payments');
    }
}
