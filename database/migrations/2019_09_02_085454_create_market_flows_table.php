<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketFlowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_flows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('period');
            $table->decimal('domestic', 5, 2);
            $table->decimal('foreign',5,2);
            $table->decimal('total_ft_naira', 8,2);
            $table->decimal('total_ft_dollar', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('market_flows');
    }
}
