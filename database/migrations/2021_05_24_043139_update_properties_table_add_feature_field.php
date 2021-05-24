<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePropertiesTableAddFeatureField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->json('feature')->nullable()->after('amenity');
            $table->time('check_in')->nullable();
            $table->time('check_out')->nullable();
            $table->float('breakfast_cost')->nullable();
            $table->float('lunch_cost')->nullable();
            $table->float('dinner_cost')->nullable();
            $table->longText('cancellation_policy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('feature');
            $table->dropColumn('check_in');
            $table->dropColumn('check_out');
            $table->dropColumn('breakfast_cost');
            $table->dropColumn('lunch_cost');
            $table->dropColumn('dinner_cost');
            $table->dropColumn('cancellation_policy');
        });
    }
}
