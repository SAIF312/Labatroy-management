<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temps', function (Blueprint $table) {
            $table->id('id');
            $table->string('Admin_id')->nullable();
            $table->string('pat_id');
            $table->string('pat_name');
            $table->string('test_name');
            $table->string('test_rate');
            $table->string('reporting_date');
            $table->string('specimen');
            $table->string('collect');
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
        Schema::dropIfExists('temps');
    }
}
