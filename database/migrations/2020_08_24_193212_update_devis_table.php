<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('devis', function (Blueprint $table) {
            $table->dropColumn('categorie_id');
            $table->bigInteger('service_id')->unsigned()->after('message');

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        }) ;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('devis', function (Blueprint $table) {
            $table->unsignedInteger('categorie_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->dropForeign('service_id');
            $table->dropColumn('service_id');
        }) ;
    }
}
