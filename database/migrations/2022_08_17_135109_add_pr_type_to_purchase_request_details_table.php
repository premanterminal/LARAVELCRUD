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
        Schema::table('purchase_request_details', function (Blueprint $table) {
            //
            $table->string('pr_type')->after('id');
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
        Schema::table('purchase_request_details', function (Blueprint $table) {
            //
            $table->dropColumn('pr_type');
        });
        Schema::enableForeignKeyConstraints();
    }
};
