<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('product_id')->nullable();
            $table->text('message');
            $table->boolean('status');
            $table->foreign('customer_id')
                    ->references('id')
                    ->on('customers');
            $table->foreign('product_id')
                    ->references('id')
                    ->on('products');
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
        Schema::table('inquiries',function(Blueprint $table){
            $table->dropForeign('inquiries_customer_id_foreign');
            $table->dropForeign('inquiries_product_id_foreign');
        });
        
        Schema::dropIfExists('inquiries');
    }
}
