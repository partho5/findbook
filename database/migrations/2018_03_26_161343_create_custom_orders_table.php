<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('book_name');
            $table->string('author_name');
            $table->string('customer_name')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('browser_id');
            $table->unsignedSmallInteger('status_code')->default(5); // 5 => order placed
            $table->string('payment_method_code')->default(1);
            $table->boolean('is_paid')->default(0);
            $table->text('msg')->nullable(); // from user
            $table->string('note')->nullable(); // entered by admin
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
        Schema::dropIfExists('custom_orders');
    }
}
