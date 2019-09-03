<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceCapitalizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_capitalizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('capitalization');
            $table->decimal('transaction_naira', 8,2);
            $table->string('naira_units', 2);
            $table->decimal('transaction_dollar', 8, 2);
            $table->string('usd_units', 2);
            $table->decimal('change', 5, 2);
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
        Schema::dropIfExists('performance_capitalizations');
    }
}
