<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\offersController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/Offers', [offersController::class, 'showOffers']);
Route::post('/CreateOffers', [offersController::class, 'createOffer']);
Route::put('/Offers/{offer}', [offersController::class, 'updateOffer']);
Route::delete('/DeleteOffers/{offer}', [offersController::class, 'deleteOffer']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource("/posts" , PostsController::class);
Route::resource("/posts/{post}/comments" , CommentsController::class);
Route::resource("/packages" , PackageController::class);
