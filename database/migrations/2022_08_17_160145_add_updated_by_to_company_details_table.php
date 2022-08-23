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
        Schema::table('company_details', function (Blueprint $table) {
            //
            $table->string('updated_by')->after('created_by');
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
        Schema::table('company_details', function (Blueprint $table) {
            //
            $table->dropColumn('updated_by');
        });
        Schema::enableForeignKeyConstraints();
    }
};
