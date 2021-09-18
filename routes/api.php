<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Journalists;
use App\Http\Controllers\Comments;
use App\Http\Controllers\NewsPosts;
use App\Http\Controllers\UsersController;

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
Route::post('/login',[UsersController::class,'login']);
Route::group(['middleware'=>['auth:sanctum']], function () {
/*___________________________________________________________
 |
 |Admin endpoints
 |____________________________________________________________
*/
Route::post('/admin/register',[UsersController::class,'createUser']);
Route::post('/admin/logout',[UsersController::class,'logout']);
Route::post('/journalist/create',[Journalists::class,'store']);
Route::patch('/journalist/update/{id}',[Journalists::class,'update']);
Route::get('/journalist/{id}',[Journalists::class,'show']);
Route::delete('/journalist/delete/{id}',[Journalists::class,'destroy']);

Route::post('/post/upload',[NewsPosts::class,'store']);
Route::put('/post/edit/{id}',[NewsPosts::class,'update']);
Route::delete('post/delete/{id}',[NewsPosts::class,'destroy']);
});

/*___________________________________________________________
  |
  |Journalist routes
  |__________________________________________________________
*/

/*___________________________________________________________
  |
  |Comments routes
  |__________________________________________________________
*/
Route::post('/comment/create',[Comments::class,'store']);
Route::get('/comment/{id}',[Comments::class,'show']);
Route::put('/comment/update/{id}',[Comments::class,'update']);
Route::delete('/comment/delete/{id}',[Comments::class,'destroy']);

/*______________________________________________________________
  |
  |News Posts Routes
  |_____________________________________________________________
*/

Route::get('/post/{id}',[NewsPosts::class,'show']);


