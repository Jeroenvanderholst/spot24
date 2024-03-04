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

 Route::get('/etim', function () {
     return Inertia::render('Etim');
 })->middleware(['auth', 'verified'])->name('etim');

Route::resource('etim/modelupdate', App\Http\Controllers\Etim\ModelUpdateController::class)->middleware('auth', 'verified', 'etimapi');

Route::middleware(['auth', 'verified'])->group(function () {
    //profile controllers
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //ETIM controllers
    Route::resource('etim/group', App\Http\Controllers\Etim\GroupController::class);
    Route::resource('etim/feature', App\Http\Controllers\Etim\FeatureController::class);
    Route::resource('etim/value', App\Http\Controllers\Etim\ValueController::class);
    Route::resource('etim/unit', App\Http\Controllers\Etim\UnitController::class);
    Route::resource('etim/product-class', App\Http\Controllers\Etim\ProductClassController::class);
    Route::resource('etim/modelling-group', App\Http\Controllers\Etim\ModellingGroupController::class);
    Route::resource('etim/modelling-class', App\Http\Controllers\Etim\ModellingClassController::class);
    Route::resource('etim/language', App\Http\Controllers\Etim\EtimLanguageController::class);
    Route::resource('etim/translation', App\Http\Controllers\Etim\TranslationController::class);
    Route::resource('etim/unit-translation', App\Http\Controllers\Etim\UnitTranslationController::class);
    Route::resource('etim/class-feature', App\Http\Controllers\Etim\ClassFeatureController::class);
    Route::resource('etim/feature-value', App\Http\Controllers\Etim\FeatureValueController::class);
    Route::resource('etim/modelling-class-port', App\Http\Controllers\Etim\ModellingClassPortController::class);
    Route::resource('etim/modelling-class-feature', App\Http\Controllers\Etim\ModellingClassFeatureController::class);
    Route::resource('etim/synonym', App\Http\Controllers\Etim\SynonymController::class);


    //xChange Controllers
    Route::resource('etim-xchange/product-detail', App\Http\Controllers\EtimXchange\ProductDetailController::class);
    Route::resource('etim-xchange/etim-value-matrix', App\Http\Controllers\EtimXchange\EtimValueMatrixController::class);
    Route::resource('etim-xchange/other-classification', App\Http\Controllers\EtimXchange\OtherClassificationController::class);
    Route::resource('etim-xchange/ordering', App\Http\Controllers\EtimXchange\OrderingController::class);
    Route::resource('etim-xchange/enclosed-trade-item', App\Http\Controllers\EtimXchange\EnclosedTradeItemController::class);
    Route::resource('etim-xchange/supplier-attachment', App\Http\Controllers\EtimXchange\SupplierAttachmentController::class);
    Route::resource('etim-xchange/catalogue-supplier', App\Http\Controllers\EtimXchange\CatalogueSupplierController::class);
    Route::resource('etim-xchange/lca-declaration', App\Http\Controllers\EtimXchange\LcaDeclarationController::class);
    Route::resource('etim-xchange/item-country-specific-field', App\Http\Controllers\EtimXchange\ItemCountrySpecificFieldController::class);
    Route::resource('etim-xchange/packaging-detail', App\Http\Controllers\EtimXchange\PackagingDetailController::class);
    Route::resource('etim-xchange/product-country-specific-field', App\Http\Controllers\EtimXchange\ProductCountrySpecificFieldController::class);
    Route::resource('etim-xchange/item-logistic-detail', App\Http\Controllers\EtimXchange\ItemLogisticDetailController::class);
    Route::resource('etim-xchange/etim-modelling-port', App\Http\Controllers\EtimXchange\EtimModellingPortController::class);
    Route::resource('etim-xchange/etim-classification', App\Http\Controllers\EtimXchange\EtimClassificationController::class);
    Route::resource('etim-xchange/product-description', App\Http\Controllers\EtimXchange\ProductDescriptionController::class);
    Route::resource('etim-xchange/catalogue', App\Http\Controllers\EtimXchange\CatalogueController::class);
    Route::resource('etim-xchange/lca-environmental', App\Http\Controllers\EtimXchange\LcaEnvironmentalController::class);
    Route::resource('etim-xchange/packaging-identification', App\Http\Controllers\EtimXchange\PackagingIdentificationController::class);
    Route::resource('etim-xchange/allowance-surcharge', App\Http\Controllers\EtimXchange\AllowanceSurchargeController::class);
    Route::resource('etim-xchange/item-detail', App\Http\Controllers\EtimXchange\ItemDetailController::class);
    Route::resource('etim-xchange/supplier', App\Http\Controllers\EtimXchange\SupplierController::class);
    Route::resource('etim-xchange/product', App\Http\Controllers\EtimXchange\ProductController::class);
    Route::resource('etim-xchange/item-attachment', App\Http\Controllers\EtimXchange\ItemAttachmentController::class);
    Route::resource('etim-xchange/price', App\Http\Controllers\EtimXchange\PriceController::class);
    Route::resource('etim-xchange/product-attachment', App\Http\Controllers\EtimXchange\ProductAttachmentController::class);
    Route::resource('etim-xchange/product-relation', App\Http\Controllers\EtimXchange\ProductRelationController::class);
    Route::resource('etim-xchange/trade-item', App\Http\Controllers\EtimXchange\TradeItemController::class);
    Route::resource('etim-xchange/legislation', App\Http\Controllers\EtimXchange\LegislationController::class);
    Route::resource('etim-xchange/classification-feature', App\Http\Controllers\EtimXchange\ClassificationFeatureController::class);
    Route::resource('etim-xchange/etim-modelling-feature', App\Http\Controllers\EtimXchange\EtimModellingFeatureController::class);
    Route::resource('etim-xchange/item-description', App\Http\Controllers\EtimXchange\ItemDescriptionController::class);
    Route::resource('etim-xchange/etim-feature', App\Http\Controllers\EtimXchange\EtimFeatureController::class);
    Route::resource('etim-xchange/item-relation', App\Http\Controllers\EtimXchange\ItemRelationController::class);
});
require __DIR__.'/auth.php';

