<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
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
/*
Route::get('/', function () {
    return Inertia::render('Dashboard', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
*/

Route::redirect('/', '/home');

Route::get('/home', function () {
    return Inertia::render('Home');
 })->middleware(['auth', 'verified'])->name('home');



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/products', function () {
    return Inertia::render('Products');
})->middleware(['auth', 'verified'])->name('products');

//  Route::get('/etim', function () {
//      return Inertia::render('Etim');
//  })->middleware(['auth', 'verified'])->name('etim');

Route::resource('etim/classification', App\Http\Controllers\EtimClassificationController::class)->middleware('auth', 'verified', 'etimapi');

Route::middleware(['auth', 'verified'])->group(function () {
    //profile controllers
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //ETIM controllers
    // Route::resource('etim/group', App\Http\Controllers\GroupController::class);
    // Route::resource('etim/feature', App\Http\Controllers\FeatureController::class);
    // Route::resource('etim/value', App\Http\Controllers\ValueController::class);
    // Route::resource('etim/unit', App\Http\Controllers\UnitController::class);
    // Route::resource('etim/product-class', App\Http\Controllers\ProductClassController::class);
    // Route::resource('etim/modelling-group', App\Http\Controllers\ModellingGroupController::class);
    // Route::resource('etim/modelling-class', App\Http\Controllers\ModellingClassController::class);
    // Route::resource('etim/language', App\Http\Controllers\EtimLanguageController::class);
    // Route::resource('etim/translation', App\Http\Controllers\TranslationController::class);
    // Route::resource('etim/unit-translation', App\Http\Controllers\UnitTranslationController::class);
    // Route::resource('etim/class-feature', App\Http\Controllers\ClassFeatureController::class);
    // Route::resource('etim/feature-value', App\Http\Controllers\FeatureValueController::class);
    // Route::resource('etim/modelling-class-port', App\Http\Controllers\ModellingClassPortController::class);
    // Route::resource('etim/modelling-class-feature', App\Http\Controllers\ModellingClassFeatureController::class);
    // Route::resource('etim/synonym', App\Http\Controllers\SynonymController::class);


    //xChange Controllers
    // Route::resource('etim-xchange/product-detail', App\Http\Controllers\ProductDetailController::class);
    // Route::resource('etim-xchange/etim-value-matrix', App\Http\Controllers\EtimValueMatrixController::class);
    // Route::resource('etim-xchange/other-classification', App\Http\Controllers\OtherClassificationController::class);
    // Route::resource('etim-xchange/ordering', App\Http\Controllers\OrderingController::class);
    // Route::resource('etim-xchange/enclosed-trade-item', App\Http\Controllers\EnclosedTradeItemController::class);
    // Route::resource('etim-xchange/supplier-attachment', App\Http\Controllers\SupplierAttachmentController::class);
    // Route::resource('etim-xchange/catalogue-supplier', App\Http\Controllers\CatalogueSupplierController::class);
    // Route::resource('etim-xchange/lca-declaration', App\Http\Controllers\LcaDeclarationController::class);
    // Route::resource('etim-xchange/item-country-specific-field', App\Http\Controllers\ItemCountrySpecificFieldController::class);
    // Route::resource('etim-xchange/packaging-detail', App\Http\Controllers\PackagingDetailController::class);
    // Route::resource('etim-xchange/product-country-specific-field', App\Http\Controllers\ProductCountrySpecificFieldController::class);
    // Route::resource('etim-xchange/item-logistic-detail', App\Http\Controllers\ItemLogisticDetailController::class);
    // Route::resource('etim-xchange/etim-modelling-port', App\Http\Controllers\EtimModellingPortController::class);
    // Route::resource('etim-xchange/etim-classification', App\Http\Controllers\EtimClassificationController::class);
    // Route::resource('etim-xchange/product-description', App\Http\Controllers\ProductDescriptionController::class);
    // Route::resource('etim-xchange/catalogue', App\Http\Controllers\CatalogueController::class);
    // Route::resource('etim-xchange/lca-environmental', App\Http\Controllers\LcaEnvironmentalController::class);
    // Route::resource('etim-xchange/packaging-identification', App\Http\Controllers\PackagingIdentificationController::class);
    // Route::resource('etim-xchange/allowance-surcharge', App\Http\Controllers\AllowanceSurchargeController::class);
    // Route::resource('etim-xchange/item-detail', App\Http\Controllers\ItemDetailController::class);
    // Route::resource('etim-xchange/supplier', App\Http\Controllers\SupplierController::class);
    // Route::resource('etim-xchange/product', App\Http\Controllers\ProductController::class);
    // Route::resource('etim-xchange/item-attachment', App\Http\Controllers\ItemAttachmentController::class);
    // Route::resource('etim-xchange/price', App\Http\Controllers\PriceController::class);
    // Route::resource('etim-xchange/product-attachment', App\Http\Controllers\ProductAttachmentController::class);
    // Route::resource('etim-xchange/product-relation', App\Http\Controllers\ProductRelationController::class);
    // Route::resource('etim-xchange/trade-item', App\Http\Controllers\TradeItemController::class);
    // Route::resource('etim-xchange/legislation', App\Http\Controllers\LegislationController::class);
    // Route::resource('etim-xchange/classification-feature', App\Http\Controllers\ClassificationFeatureController::class);
    // Route::resource('etim-xchange/etim-modelling-feature', App\Http\Controllers\EtimModellingFeatureController::class);
    // Route::resource('etim-xchange/item-description', App\Http\Controllers\ItemDescriptionController::class);
    // Route::resource('etim-xchange/etim-feature', App\Http\Controllers\EtimFeatureController::class);
    // Route::resource('etim-xchange/item-relation', App\Http\Controllers\ItemRelationController::class);
});
require __DIR__.'/auth.php';

