<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceSectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_sectors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('industry_sector');
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
        Schema::dropIfExists('performance_sector');
    }
}
