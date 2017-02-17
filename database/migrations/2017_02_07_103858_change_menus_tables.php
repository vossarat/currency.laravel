<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeMenusTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * изменение имени столбца parent на parent_id
     */
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            
             $table->dropColumn('parent');             
             $table->integer('parent_id')->after('position')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            //
        });
    }
}
