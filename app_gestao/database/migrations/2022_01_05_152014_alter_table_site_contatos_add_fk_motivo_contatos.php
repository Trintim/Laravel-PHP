<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //adicionando  a coluna motivo_contatos_id
        Schema::table('site_contatos', function (Blueprint $table) {

            $table->unsignedBigInteger('motivo_contatos_id');

        });
        //atribuindo motivo_contato para a nova coluna motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo');
        //criando a fk e removendo a coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table) {

            $table->foreign('motivo_contatos_id')->references('id')->on("motivo_contatos");
            $table->dropColumn('motivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contatos', function (Blueprint $table) {

            $table->integer('motivo');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        DB::statement('update site_contatos set motivo = motivo_contatos_id');

        Schema::table('site_contatos', function (Blueprint $table) {

            $table->dropColumn('motivo_contatos_id');

        });
    }
}
