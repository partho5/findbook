<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger('product_id');
            $table->unsignedMediumInteger('user_id')->nullable();
            $table->string('browser_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('univ_name')->nullable();
            $table->string('hall_name')->nullable();
            $table->string('room_no')->nullable();
            $table->text('full_address')->nullable();
            $table->unsignedSmallInteger('quantity')->default(1);
            $table->string('promo_code')->nullable();
            $table->unsignedSmallInteger('status_code')->default(5); // 5 => order placed
            $table->string('payment_method_code')->default(1);
            $table->boolean('is_paid')->default(0);
            $table->text('msg')->nullable(); // from user
            $table->string('note')->nullable(); // entered by admin
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
