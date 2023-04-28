<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('fqdn')->unique();
            $table->char('analytics_id', 50)->nullable();
            $table->string('email')->unique()->nullable();
            $table->char('phone', 10)->nullable();
            $table->string('address')->nullable();
            $table->char('whatsapp', 10)->nullable();
            $table->string('skype')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tawk_to')->nullable();
            $table->string('kampanya_line1')->nullable();
            $table->string('kampanya_line2')->nullable();
            $table->string('home_text')->nullable();
            $table->text('about')->nullable();
            $table->string('logo')->nullable();
            $table->string('background')->nullable();
            $table->string('image1')->nullable();
            $table->string('lang')->default('tr');
            $table->string('currency')->default('TRY');
            $table->string('theme')->default('theme-4');
            $table->string('skin')->nullable();
            $table->string('heading_1')->nullable();
            $table->string('heading_2')->nullable();
            $table->boolean('out_of_stock')->default(0);
            $table->boolean('netgsm_status')->default(0);
            $table->string('netgsm_header')->nullable();
            $table->string('netgsm_message')->nullable();
            $table->boolean('status')->default(0);
            $table->string('paytr_merchant_id')->nullable();
            $table->string('paytr_merchant_key')->nullable();
            $table->string('paytr_merchant_salt')->nullable();
            $table->boolean('paytr_test_mode')->default(1);
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
        Schema::dropIfExists('sites');
    }
}
