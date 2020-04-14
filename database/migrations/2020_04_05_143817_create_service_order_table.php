<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->decimal('subtotal', 10, 2)->nullable(false)->default(0);
            $table->timestamps();

            $table->foreign('order_id')
                ->references('id')
                ->on('order_services')
                ->onDelete('no action');

            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onDelete('no action');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_order');
    }
}
