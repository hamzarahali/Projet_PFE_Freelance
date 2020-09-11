<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeignDemandeformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('demande_formations', function (Blueprint $table) {
            $table->dropColumn('formation_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('demande_formations', function (Blueprint $table) {
            $table->unsignedInteger('formation_id')
            ->references('id')
            ->on('formations')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }
}
