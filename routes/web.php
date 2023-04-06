<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Assessment;
use App\Models\Week;

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

Route::get('/', function () {
    $files = [];
    $assesments = Assessment::get();
    return view('home', ['assessments' => $assesments]);
})->name('home');
Route::get('/create', function () {
    return view('welcome');
})->name('create');
Route::post("/", function (Request $request) {
    $assesment = Assessment::where('uid', $request->uid)->first() ?? new Assessment();
    $assesment->uid = $request->uid;
    $assesment->gid = $request->gid;
    $assesment->min = $request->min;
    $assesment->max = $request->max;
    $assesment->days = $request->days;
    $assesment->weeks = $request->weeks;
    // $assesment->total_amount = $request->total_amount;
    $assesment->save();
    $weeks = Week::where('uid', $request->uid)->get();

    foreach ($request->day1 as $key => $value) {
        $week = null;
        if (isset($weeks[$key])) {
            $week = $weeks[$key];
        } else {
            $week = new Week();
            $week->uid = $request->uid;
        }

        $week->day1 = $value;
        $week->day2 = $request->day2[$key];
        $week->day3 = $request->day3[$key];
        $week->day4 = $request->day4[$key];
        $week->day5 = $request->day5[$key];
        $week->save();
    }
    // Alert::success("Hello Badmous");
    return view('home');
})->name('save');
Route::get("/{uid}", function ($uid) {
    $assesment = Assessment::where('uid', $uid)->first();
    return view('welcome', ['assessment' => $assesment]);
})->name('view');
