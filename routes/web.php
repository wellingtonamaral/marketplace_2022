<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home');
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product/{slug}', [App\Http\Controllers\HomeController::class, 'single'])->name('product.single');

Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/proccess', [App\Http\Controllers\CheckoutController::class, 'proccess'])->name('checkout.proccess');






Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::get('/remove/{slug}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::get('/cancel', [App\Http\Controllers\CartController::class, 'cancel'])->name('cart.cancel');

Route::get('/model', function () {

});

Route::group(['middleware' => ['auth']], function(){
    Route::prefix('admin')->namespace('App\\Http\\Controllers\\Admin')->group(function(){

        Route::prefix('stores')->group(function(){

            Route::get('/','StoreController@index')->name('admin.stores.index'); /* Laravel 8 */
            Route::get('/create','StoreController@create')->name('admin.stores.create'); /* Laravel 8 */
            Route::post('/store','StoreController@store')->name('admin.stores.store'); /* Laravel 8 */
            Route::get('/{store}/edit','StoreController@edit')->name('admin.stores.edit'); /* Laravel 8 */
          Route::post('/update/{store}','StoreController@update')->name('admin.stores.update'); /* Laravel 8 */
          Route::get('/destroy/{store}','StoreController@destroy')->name('admin.stores.destroy'); /* Laravel 8 */


       });

        Route::prefix('products')->group(function(){

            Route::get('/','ProductController@index')->name('admin.products.index'); /* Laravel 8 */
            Route::get('/create','ProductController@create')->name('admin.products.create'); /* Laravel 8 */
            Route::post('/product','ProductController@store')->name('admin.products.store'); /* Laravel 8 */
            Route::get('/{product}/edit','ProductController@edit')->name('admin.products.edit'); /* Laravel 8 */
            Route::post('/update/{product}','ProductController@update')->name('admin.products.update'); /* Laravel 8 */
            Route::get('/destroy/{product}','ProductController@destroy')->name('admin.products.destroy'); /* Laravel 8 */



        });
        Route::prefix('categories')->group(function(){

            Route::get('/','CategoryController@index')->name('admin.categories.index'); /* Laravel 8 */
            Route::get('/create','CategoryController@create')->name('admin.categories.create'); /* Laravel 8 */
            Route::post('/category','CategoryController@store')->name('admin.categories.store'); /* Laravel 8 */
            Route::get('/{category}/edit','CategoryController@edit')->name('admin.categories.edit'); /* Laravel 8 */
            Route::post('/update/{category}','CategoryController@update')->name('admin.categories.update'); /* Laravel 8 */
            Route::get('/destroy/{category}','CategoryController@destroy')->name('admin.categories.destroy'); /* Laravel 8 */


        });
        Route::prefix('photo')->group(function(){
        //Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');
        Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('admin.photo.remove');
    });
   });


});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
