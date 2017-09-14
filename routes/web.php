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
use Illuminate\Support\Facades\Mail;

Route::view('/', 'welcome', [
    'name' => 'GabrielAttila'
]);

// tipo de redireccion por defecto 301
// 301: permanente
// 302: temporal
Route::redirect('welcome', '/', 302);

Route::get('email', function (){
    //Mail::to('gabrieljmorenot@gmail.com')->send(new \App\Mail\WelcomeUser());
    // 5.5
    return new \App\Mail\WelcomeUser('GabrielAttila');
});

Route::get('profile', function (){
    return factory(\App\Profile::class)->create();
});
