<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->timestamps();
        });

        $dataFromBlog = Http::get('https://offbeatstays.in/wp-json/wp/v2/listing_type',
            [
                'per_page' => 25
            ])->json();

        $categories = array();
        foreach ($dataFromBlog as $key => $category) {
            $categories[$key] = array(
                                'name'=>$category['name'],
                                'slug'=>SlugService::createSlug(Category::class, 'slug', $category['name'])
                            );
        }

        // Insert some stuff
        DB::table('categories')->insert(
            $categories
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
