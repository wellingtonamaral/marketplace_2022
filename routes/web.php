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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/model', function () {

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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


});



//Route::post
//Route::put
//Route::patch
//Route::delete
//Route::options

