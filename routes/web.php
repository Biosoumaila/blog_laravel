<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/blog')->name('blog.') ->controller(\App\Http\Controllers\BlogController::class)->group(function(){
    
    Route::get('/',[\App\Http\Controllers\BlogController::class,'index'])->name('index');
    
    Route::get('/{slug}-{id}','show')->where([
        'id' => '[0-9]+',
        'slug' => '[a-z0-9\-]+'
    ])->name('blog.show');


});
