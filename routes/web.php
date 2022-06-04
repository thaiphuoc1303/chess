<?php
namespace App\Http\Controllers;
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
    return redirect('login');
});
Route::get('register', function(){
    return view('Login.Register');
});
Route::post('post-register', [AuthController::class, 'post_register']);
Route::get('login', function(){
    return view('Login.Login');
})->middleware('checklogout');
Route::post('post-login', [AuthController::class, 'post_login']);
Route::get('logout', [AuthController::class, 'logout']);
Route::group(['prefix'=> '/', 'middleware'=>['checklogin']], function(){
    Route::get('home', [HomeController::class, 'index']);
    Route::get('create-room', [HomeController::class, 'create']);
    Route::get('gaming/{id}', [GamingController::class, 'index']);
    Route::get('player/{id}', [HomeController::class, 'player']);
    Route::get('backhome/{id}', [HomeController::class, 'backhome']);
    Route::get('start/{id}', [GamingController::class, 'start']);
    Route::post('move', [GamingController::class, 'move']);
    Route::post('choitiep', [GamingController::class, 'choitiep']);

    Route::post('chat', [GamingController::class, 'chat']);

    Route::get('surrender/{id}', [GamingController::class, 'surrender']);
    Route::get('quit/{id}', [GamingController::class, 'quit']);

    Route::get('random', [HomeController::class, 'random']);


    Route::get('ajax-khangia/{id}', [GamingController::class, 'khangia']);
    Route::get('ajax-khangiachat/{id}', [GamingController::class, 'khangiachat']);

    Route::get('bot', [HomeController::class, 'choosebot']);
    Route::get('bot-easy', [BotController::class, 'easy']);
    Route::get('bot-medium', [BotController::class, 'medium']);
    Route::get('bot-hard', [BotController::class, 'hard']);

    Route::get('profile', [ProfileController::class, 'profile']);
    Route::get('profile/{id}', [ProfileController::class, 'playerProfile']);
    Route::get('ajax-profile/{id}', [ProfileController::class, 'ajaxProfile']);

    Route::post('update-background', [ProfileController::class, 'updatebackground']);
    Route::post('update-avatar', [ProfileController::class, 'updateavatar']);
    Route::post('update-password', [ProfileController::class, 'updatepassword']);
});
Route::get('play-bot', function () {
    return view('bot');
});

Route::get('firebase', function () {
    return view('test');
});