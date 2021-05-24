<?php

use Illuminate\Support\Facades\Route;	
use App\Http\Controllers\Admin\adminDashboardController;
use App\Http\Controllers\Admin\adminStateController;
use App\Http\Controllers\Admin\adminLocationController;
use App\Http\Controllers\Admin\adminCategoryController;
use App\Http\Controllers\Admin\adminAmenityController;
use App\Http\Controllers\Admin\adminFeatureController;
use App\Http\Controllers\Admin\adminPropertyController;

//For components
use App\Http\Livewire\Front\HomeComponent;
use App\Http\Livewire\Front\AboutComponent;
use App\Http\Livewire\Front\ContactUsComponent;
use App\Http\Livewire\Front\ListingComponent;
use App\Http\Livewire\Front\AllStatesComponent;
use App\Http\Livewire\Front\StateComponent;
use App\Http\Livewire\Front\AllCategoriesComponent;
use App\Http\Livewire\Front\CategoryComponent;
use App\Http\Livewire\Front\PropertyDetailComponent;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\ReadXmlController;

Route::get("read-xml", [ReadXmlController::class, "index"]);

Route::get('/home', function () {
    return redirect('/');
});




Route::get('/', HomeComponent::class)->name('front.home');
Route::get('/search', ListingComponent::class)->name('front.listing');
Route::get('/india', AllStatesComponent::class)->name('front.state.all');
Route::get('/property/{slug}', StateComponent::class)->name('front.state.show');
// Route::get('/property/{state}/{slug}', LocationComponent::class)->name('front.location.show');
Route::get('/stay-types', AllCategoriesComponent::class)->name('front.category.all');
Route::get('/stay-type/{slug}', CategoryComponent::class)->name('front.category.show');


Route::get('/property/{state}/{location}/{category}/{slug}', PropertyDetailComponent::class)->name('front.property.show');



Route::get('/about', AboutComponent::class)->name('front.about');
Route::get('/contact', ContactUsComponent::class)->name('front.contact');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->get('dashboard', [adminDashboardController::class, 'show'])->name('admin.dashboard');



// for admin
Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'verified'])->group(function () {
    
    Route::get('/', function(){
    	return redirect('/admin/dashboard');
    });
    Route::get('/dashboard', [adminDashboardController::class, 'show'])->name('dashboard');
    Route::resources([
	    'state' => adminStateController::class,
	    'location' => adminLocationController::class,
	    'category' => adminCategoryController::class,
        'amenity' => adminAmenityController::class,
        'feature' => adminFeatureController::class,
	    'property' => adminPropertyController::class,
	    // 'posts' => PostController::class,
	]);
});









