<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('index');
});


Route::post('/feedback/store', function (Request $request) {
    $request->validate([
    'feedback' => 'required|string|max:500',
    ]);

    // Store feedback in session
    $feedbacks = session()->get('feedbacks', []);
    $feedbacks[] = $request->input('feedback');
    session()->put('feedbacks', $feedbacks);

return redirect()->back()->with('success', 'Feedback submitted successfully!');
})->name('feedback.store');

Route::post('/feedback/clear', function () {
    session()->forget('feedbacks');
    return redirect()->back()->with('success', 'All feedback cleared.');
})->name('feedback.clear');
