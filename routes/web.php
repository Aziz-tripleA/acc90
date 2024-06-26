<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangController;

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
$dirs = ['Web', 'Routes'];


Route::group([
    //'prefix' => LaravelLocalization::setLocale(),
    //'middleware' => ['localeSessionRedirect', 'localizationRedirect'],
], function () use ($dirs) {
    foreach ($dirs as $dir) {
        foreach (app('files')->allFiles(__DIR__ . "/$dir") as $route_file) {
            require $route_file->getPathname();
        }
    }
});

Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');
Route::post('/search', [\App\Http\Controllers\SearchController::class, 'getSearchResult'])->name('search');
Route::get('/search', [\App\Http\Controllers\SearchController::class, 'getSearchResultPage'])->name('search.show');
