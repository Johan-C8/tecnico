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

Route::get('/sayhello', function () {
    return "<h1> HOLA MUNDO </h1>";
});


//

Route::get('/pets/show', function () {
    $pets = App\Models\Pet::all();
    //echo var_dump($pets);
    dd($pets->toArray()); //Dump & Die
});

Route::get('/petsview', function () {
    $pets = App\Models\Pet::all();
    
    return view('petsview')->with('pets', $pets);
});



//


Route::get('/users/show', function () {
    $users = App\Models\User::all();
    //echo var_dump($pets);
    dd($users->toArray()); //Dump & Die
});

Route::get('/usersview', function () {
    $users = App\Models\User::all();
    
    return view("usersview")->with('users', $users);
});
 
