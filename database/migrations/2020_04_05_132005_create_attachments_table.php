<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('order_id')->unsigned();
            $table->string('name')->nullable(false);
            $table->string('thumbnail')->nullable(false);
            $table->string('url')->nullable(false);
            $table->string('path')->nullable(false);
            $table->string('size')->nullable(false);
            $table->timestamps();

            $table->foreign('order_id')
                ->references('id')
                ->on('order_services')
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
        Schema::dropIfExists('attachments');
    }
}
