<?php

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

//Criado uma middleware, registrado no app/http/kernel.php no array web para atribuicao em no sistema
Route::get('lang', function () {
    $lang = session('lang', 'pt-BR');
    if($lang == 'pt-BR') {
        $lang = 'en';
    } else {
        $lang = 'pt-BR';
    }
    session(['lang' => $lang]);
    return redirect()->back();
})->name('lang');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->namespace('Admin')->group(function (){
    Route::resource('/users', 'UserController');
});

