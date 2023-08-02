<?php

use App\Models\User;
use App\Models\Game;
use App\Models\Developer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\RouteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

Route::get('/game', function () {
    $games = Game::all();
    $ownGames = [];
    if (auth()->check()) {
        $ownGames = auth()->user()->usersAddedGames()->latest()->get();
    }
    return view('game', ['games' => $games], ['ownGames' => $ownGames]);
});

Route::get('/developer', function () {
    $developers = Developer::all();
    $ownDevs = [];
    if (auth()->check()) {
        $ownDevs = auth()->user()->usersAddedDevs()->latest()->get();
    }
    return view('developer', ['developers' => $developers], ['ownDevs' => $ownDevs]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::post('/addGame', [GameController::class, 'addGame']);
Route::get('/editGame/{game}', [GameController::class, 'editGame']);
Route::put('/editGame/{game}', [GameController::class, 'updateGame']);
Route::delete('/deleteGame/{game}', [GameController::class, 'deleteGame']);

Route::post('/addDev', [DeveloperController::class, 'addDev']);
Route::get('/editDev/{developer}', [DeveloperController::class, 'editDev']);
Route::put('/editDev/{developer}', [DeveloperController::class, 'updateDev']);
Route::delete('/deleteDev/{developer}', [DeveloperController::class, 'deleteDev']);