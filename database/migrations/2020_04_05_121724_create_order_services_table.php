<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('warranty_id')->unsigned()->nullable(true)->comment('Termo de Garantia.');
            $table->integer('order_status_id')->unsigned()->nullable(false)->comment('Status da ordem de serviço.');
            $table->bigInteger('client_id')->unsigned()->nullable(false)->comment('Cliente.');
            $table->bigInteger('user_id')->unsigned()->nullable(false)->comment('Usuário responsável.');
            $table->timestamp('start_date')->nullable(true)->comment('Data de inicio da ordem de serviço.');
            $table->timestamp('end_date')->nullable(true)->comment('Data de finalização da ordem de serviço.');
            $table->text('description_product')->nullable(true)->comment('Descrição do produto/serviço.');
            $table->text('defect')->nullable(true)->comment('Defeito apresentado');
            $table->text('note')->nullable(true)->comment('Observações');
            $table->text('technical_report')->nullable(true)->comment('Relatório Técnico');
            $table->decimal('total', 10, 2)->nullable(false)->default(0)->comment('Valor total da ordem de serviço.');
            $table->tinyInteger('invoice')->default(0)->comment('Status de faturado.');
            $table->tinyInteger('status')->default(1)->comment('Status da ordem de serviço, sendo: 1 ativo, 0 inativo, -1 excluido.');
            $table->timestamps();

            $table->foreign('warranty_id')
                ->references('id')
                ->on('warranties')
                ->onDelete('no action');

            $table->foreign('order_status_id')
                ->references('id')
                ->on('order_statuses')
                ->onDelete('no action');

            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onDelete('no action');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('order_services');
    }
}
