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
        Schema::create('purchase_requests', function (Blueprint $table) {
            $table->id();
            $table->string('pr_no');
            $table->bigInteger('id_barang');
            $table->string('nama_barang');
            $table->string('type');
            $table->string('unit');
            $table->decimal('jumlah');
            $table->bigInteger('id_project');
            $table->string('nama_project');
            $table->string('status');
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
        Schema::dropIfExists('purchase_requests');
        Schema::enableForeignKeyConstraints();
    }
};
