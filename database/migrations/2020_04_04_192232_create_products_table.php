<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique()->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('description')->nullable(true);
            $table->char('unit', 5)->nullable(false)->default('UN');
            $table->decimal('purchase_price', 10, 2)->nullable(false)->default(0);
            $table->decimal('sale_price', 10, 2)->nullable(false)->default(0);
            $table->integer('stock')->nullable(false)->default(0);
            $table->integer('minimum_stock')->nullable(false)->default(0);
            $table->timestamps();

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
        Schema::dropIfExists('products');
    }
}
