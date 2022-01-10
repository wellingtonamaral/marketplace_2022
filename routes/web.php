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


   //return \App\Models\User::all();




//Criar um loja para um usuário

//  $user = \App\Models\User::find(10);
// $store = $user->store()->create([

//     'name' => 'Loja teste',
//     'description' => 'Loja teste de Celulares',
//     'phone' => 'xx-xxxxx-xxxx',
//     'mobile_phone' => 'xx-xxxxx-xxxx',
//     'slug' => 'Loja-teste'

// ]);
// dd($store);

//Criar um produto para uma loja
// $store = \App\Models\Store::find(11);
// $product = $store->products()->create([
//     'name' => 'Xiaomi 9 ',
//     'description' => '32GB',
//     'body' => 'Qualquer coisa...',
//     'price' => 2999.90,
//     'slug' => 'xiaomi-redmi-9'

// ]);
// dd($product);



//Criar uma categoria
//   \App\Models\Category::create([
//     'name' => 'Games ',
//     'description' => null,
//     'slug' => 'games',

// ]);
// \App\Models\Category::create([
//     'name' => 'Notebook ',
//     'description' => null,
//     'slug' => 'notebooks',

// ]);

// return \App\Models\Category::all();


//Adicionar um produto para uma categoria ou vice-versa

//$product = \App\Models\Product::find(11);
//dd($product->categories()->detach([1]));
//dd($product->categories()->attach([1]));
//dd($product->categories()->sync([2]));


// $product = \App\Models\Product::find(11);
// return $product->categories;


});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Route::get
//Route::get('/admin/stores','Admin\\StoreController@index'); /* Laravel 6 */
Route::get('/admin/stores','\\App\\Http\\Controllers\\Admin\\StoreController@index'); /* Laravel 8 */
//[\App\Http\Controllers\Admin\StoreController::class, 'index']



//Route::post
//Route::put
//Route::patch
//Route::delete
//Route::options

