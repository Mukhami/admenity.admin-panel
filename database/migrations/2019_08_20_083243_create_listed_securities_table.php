<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListedSecuritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listed_securities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category');
            $table->integer('number_listed');
            $table->decimal('mkt_cpt_ngn', 20, 2);
            $table->decimal('mkt_cpt_usd',20,2);
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
        Schema::dropIfExists('listed_securities');
    }
}
