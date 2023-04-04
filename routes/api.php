<?php

use App\Models\Assessment;
use App\Models\Week;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
});
Route::get('/{uid}', function ($uid) {
    // return $uid;
    $assessment = Assessment::with('weekly')->where('uid', $uid)->first();
    if ($assessment) {
        return response()->json(['status' => 200, 'data' => $assessment]);
    } else {
        return response()->json(['status' => 400, 'data' => "Does not exist"]);
    }
});
