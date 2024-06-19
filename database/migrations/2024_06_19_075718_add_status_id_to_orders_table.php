<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id')->nullable();

            // Define foreign key constraint
            $table->foreign('status_id')->references('id')->on('statuses')
                ->onDelete('cascade'); // This will delete related orders if the status is deleted
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['status_id']);

            // Drop the column
            $table->dropColumn('status_id');
        });
    }
};
