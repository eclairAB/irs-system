<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateContReceivingFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('container_receivings', function (Blueprint $table) {
            //
            $table->text('remarks')->nullable()->change();
            $table->timestampTz('manufactured_date')->nullable()->change();
            $table->dropColumn('signature');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('container_receivings', function (Blueprint $table) {
            //
            $table->dropColumn('remarks');
            $table->dropColumn('manufactured_date');
            $table->text('signature');
        });
    }
}
