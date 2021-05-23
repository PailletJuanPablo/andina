<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToCobranzas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cobranzas', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->string('ceco_name')->nullable();
            $table->string('peaje')->nullable();
            $table->string('espera')->nullable();
            $table->string('adicional')->nullable();
            $table->string('total')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cobranzas', function (Blueprint $table) {
            //
        });
    }
}
