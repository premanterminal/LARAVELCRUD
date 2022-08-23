<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('item_stocks', function (Blueprint $table) {
            //
            $table->bigInteger('po_id')->after('warehouse_id');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('item_stocks', function (Blueprint $table) {
            //
            $table->dropColumn('po_id');
        });
        Schema::enableForeignKeyConstraints();
    }
};
