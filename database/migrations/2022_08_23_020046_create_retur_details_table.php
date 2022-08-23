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
        Schema::create('retur_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('po_id');
            $table->bigInteger('po_no');
            $table->bigInteger('item_id');
            $table->string('item_name');
            $table->string('type');
            $table->string('unit');
            $table->decimal('stock');
            $table->bigInteger('from');
            $table->bigInteger('from_item');
            $table->string('from_pic');
            $table->bigInteger('to');
            $table->bigInteger('to_item');
            $table->string('to_pic');
            $table->string('status');
            $table->string('no_sj');
            $table->string('notes');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
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
        Schema::dropIfExists('retur_details');
        Schema::enableForeignKeyConstraints();
    }
};
