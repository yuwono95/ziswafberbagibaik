<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::post('permissions/parse-csv-import', 'PermissionsController@parseCsvImport')->name('permissions.parseCsvImport');
    Route::post('permissions/process-csv-import', 'PermissionsController@processCsvImport')->name('permissions.processCsvImport');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Top Ten Anggota
    Route::delete('top-ten-anggota/destroy', 'TopTenAnggotaController@massDestroy')->name('top-ten-anggota.massDestroy');
    Route::resource('top-ten-anggota', 'TopTenAnggotaController');

    // Perolehan Upa
    Route::delete('perolehan-upas/destroy', 'PerolehanUpaController@massDestroy')->name('perolehan-upas.massDestroy');
    Route::resource('perolehan-upas', 'PerolehanUpaController');

    // Perolehan Sendiri
    Route::delete('perolehan-sendiris/destroy', 'PerolehanSendiriController@massDestroy')->name('perolehan-sendiris.massDestroy');
    Route::resource('perolehan-sendiris', 'PerolehanSendiriController');

    // Perolehan Dpc
    Route::delete('perolehan-dpcs/destroy', 'PerolehanDpcController@massDestroy')->name('perolehan-dpcs.massDestroy');
    Route::resource('perolehan-dpcs', 'PerolehanDpcController');

    // Top Ten Upa
    Route::delete('top-ten-upas/destroy', 'TopTenUpaController@massDestroy')->name('top-ten-upas.massDestroy');
    Route::resource('top-ten-upas', 'TopTenUpaController');

    // Perolehan Semua Dpc
    Route::delete('perolehan-semua-dpcs/destroy', 'PerolehanSemuaDpcController@massDestroy')->name('perolehan-semua-dpcs.massDestroy');
    Route::resource('perolehan-semua-dpcs', 'PerolehanSemuaDpcController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::post('teams/parse-csv-import', 'TeamController@parseCsvImport')->name('teams.parseCsvImport');
    Route::post('teams/process-csv-import', 'TeamController@processCsvImport')->name('teams.processCsvImport');
    Route::resource('teams', 'TeamController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Input Perolehan
    Route::delete('input-perolehans/destroy', 'InputPerolehanController@massDestroy')->name('input-perolehans.massDestroy');
    Route::post('input-perolehans/parse-csv-import', 'InputPerolehanController@parseCsvImport')->name('input-perolehans.parseCsvImport');
    Route::post('input-perolehans/process-csv-import', 'InputPerolehanController@processCsvImport')->name('input-perolehans.processCsvImport');
    Route::resource('input-perolehans', 'InputPerolehanController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
