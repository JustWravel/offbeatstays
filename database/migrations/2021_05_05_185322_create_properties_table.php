<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('properties');
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('state_id')->nullable()->constrained();
            $table->foreignId('location_id')->nullable()->constrained();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->text('description')->nullable();
            $table->text('amenity')->nullable();
            $table->json('feature')->nullable();
            $table->time('check_in')->nullable();
            $table->time('check_out')->nullable();
            $table->float('breakfast_cost')->nullable();
            $table->float('lunch_cost')->nullable();
            $table->float('dinner_cost')->nullable();
            $table->longText('cancellation_policy')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
