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
        Schema::create('item_stocks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_id');
            $table->string('item_name');
            $table->string('type');
            $table->string('unit');
            $table->decimal('stock');
            $table->bigInteger('warehouse_id');
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
        Schema::dropIfExists('item_stocks');
        Schema::enableForeignKeyConstraints();
    }
};
