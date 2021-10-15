<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
        });

        Schema::create('date', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();
        });

        Schema::create('course_currency', function (Blueprint $table) {
            $table->id();
            $table->decimal("course", 8, 4);
            $table->integer('currency_id');
            $table->integer('date_id');
            $table->index(['date_id', 'currency_id'], 'unique_currency_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency');
        Schema::dropIfExists('date');
        Schema::dropIfExists('course_currency');
    }
}
