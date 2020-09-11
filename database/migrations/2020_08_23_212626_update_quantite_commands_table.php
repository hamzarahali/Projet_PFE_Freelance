<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateQuantiteCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('commands', function (Blueprint $table) {
            $table->dropColumn('quantite');
        });

        Schema::table('cmd_produits', function (Blueprint $table) {
            $table->bigInteger('quantite')->after('produit_id');
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
        Schema::table('commands', function (Blueprint $table) {
            $table->bigInteger('quantite');
        });

        Schema::table('cmd_produits', function (Blueprint $table) {
            $table->dropColumn('quantite');
        });
    }
}
