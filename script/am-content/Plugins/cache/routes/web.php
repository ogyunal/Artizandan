<?php 


Route::group(['namespace'=>'Amcoders\Plugin\cache\http\controllers','middleware'=>'web','prefix'=>'admin','as'=>'admin.'],function(){

	Route::get('cache','CacheController@index')->name('cache');

	//Clear Cache facade value:
    Route::post('clear-cache', function() {
        $exitCode = \Artisan::call('cache:clear');
        return response()->json('Cache Clear Successfully');
    })->name('clear-cache');

    //Reoptimized class loader:
    Route::post('optimize', function() {
        $exitCode = \Artisan::call('cache:clear');
        $exitCode = \Artisan::call('route:clear');
        $exitCode = \Artisan::call('view:clear');
        $exitCode = \Artisan::call('config:cache');
        return response()->json('Reoptimized class loader');
    })->name('optimize');

    //Clear Route cache:
    Route::post('route-clear', function() {
        $exitCode = \Artisan::call('route:clear');
        return response()->json('Route cache cleared');
    })->name('route-clear');

    //Clear View cache:
    Route::post('view-clear', function() {
        $exitCode = \Artisan::call('view:clear');
        return response()->json('View cache cleared');
    })->name('view-clear');

    //Clear Config cache:
    Route::post('config-cache', function() {
        $exitCode = \Artisan::call('config:cache');
        return response()->json('Clear Config cleared');
    })->name('config-cache');

});