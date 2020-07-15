<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRightsToUsers extends Migration
{
    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->boolean('rights_add_key')->default(1);
            $table->boolean('rights_delete_key')->default(1);
            $table->boolean('rights_edit_key')->default(1);
            $table->boolean('rights_book_key')->default(1);
            $table->boolean('rights_return_key')->default(1);
            $table->boolean('rights_add_fob')->default(1);
            $table->boolean('rights_delete_fob')->default(1);
            $table->boolean('rights_edit_fob')->default(1);
            $table->boolean('rights_book_fob')->default(1);
            $table->boolean('rights_return_fob')->default(1);
        });
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('rights_add_key');
            $table->dropColumn('rights_delete_key');
            $table->dropColumn('rights_edit_key');
            $table->dropColumn('rights_book_key');
            $table->dropColumn('rights_return_key');
            $table->dropColumn('rights_add_fob');
            $table->dropColumn('rights_delete_fob');
            $table->dropColumn('rights_edit_fob');
            $table->dropColumn('rights_book_fob');
            $table->dropColumn('rights_return_fob');
        });
    }



}
