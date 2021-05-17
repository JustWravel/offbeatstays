<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->float('cost_per_night', 8, 2)->nullable();
            $table->float('cost_per_night_weekend', 8, 2)->nullable();
            $table->float('cost_per_night_weekly', 8, 2)->nullable();
            $table->float('cost_per_night_fortnightly', 8, 2)->nullable();
            $table->float('cost_per_night_monthly', 8, 2)->nullable();
            $table->boolean('breakfast_included')->default(false);
            $table->text('image')->nullable();
            $table->text('amenity')->nullable();
            $table->foreignId('property_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_rooms');
    }
}
