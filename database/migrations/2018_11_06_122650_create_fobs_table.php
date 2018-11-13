<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fob_id');
            $table->string('borrower')->nullable();
            $table->string('alocated_by')->nullable();
            $table->boolean('available')->default(1);
            $table->boolean('lost')->default(0);
            $table->date('borrowed_at')->nullable();
            $table->date('returned_at')->nullable();
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
        Schema::dropIfExists('fobs');
    }
}
