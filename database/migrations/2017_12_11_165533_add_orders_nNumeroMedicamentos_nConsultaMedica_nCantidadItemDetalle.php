<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrdersNNumeroMedicamentosNConsultaMedicaNCantidadItemDetalle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Integer('nNumeroMedicamentos')->unsigned()->default(0);
            $table->Integer('nConsultaMedica')->unsigned()->default(0);
            $table->Integer('nCantidadItemDetalle')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function ($table) {
           $table->dropColumn('nNumeroMedicamentos');
           $table->dropColumn('nConsultaMedica');
           $table->dropColumn('nCantidadItemDetalle');
        });
    }
}
