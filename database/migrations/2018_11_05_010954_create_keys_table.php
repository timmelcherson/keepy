<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeysTable extends Migration
{
    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key_id');
            $table->string('room');
            $table->string('keytype');
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
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keys');
    }
}
