<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando tabela filiais
        Schema::create('filiais', function (Blueprint $tabela) {
            $tabela -> id();
            $tabela -> string('filial', 30);
            $tabela -> timestamps();
        });
        //criando tabela produto_filiais
        Schema::create('produto_filiais', function (Blueprint $tabela) {
            $tabela -> id();
            $tabela -> unsignedBigInteger('filial_id');
            $tabela -> unsignedBigInteger('produto_id');
            $tabela -> decimal('preco_venda', 8, 2);
            $tabela -> integer('estoque_minimo');
            $tabela -> integer('estoque_maximo');
            $tabela -> timestamps();

            //foreign key (constraints)
            $tabela -> foreign('filial_id') -> references('id') -> on('filiais');
            $tabela -> foreign('produto_id') -> references('id') -> on('produtos');
        });

        //removendo colunas da tabela product
       Schema::table('produtos', function (Blueprint $tabela) {
            $tabela -> dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //apagar tabela produtos

        Schema::table('produtos', function (Blueprint $tabela) {
            $tabela -> decimal('preco_venda', 8, 2);
            $tabela -> integer('estoque_minimo');
            $tabela -> integer('estoque_maximo');

        });

        Schema::dropIfExists('produto_filiais');

        Schema::dropIfExists('filiais');
    }
}
