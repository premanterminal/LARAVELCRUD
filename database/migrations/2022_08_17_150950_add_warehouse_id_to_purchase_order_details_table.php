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
        Schema::table('purchase_order_details', function (Blueprint $table) {
            //
            $table->bigInteger('warehouse_id')->after('payment_metode');
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
        Schema::table('purchase_order_details', function (Blueprint $table) {
            //
            $table->dropColumn('warehouse_id');
        });
        Schema::enableForeignKeyConstraints();
    }
};
