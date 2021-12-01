<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

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

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Input Perolehan
    Route::delete('input-perolehans/destroy', 'InputPerolehanController@massDestroy')->name('input-perolehans.massDestroy');
    Route::post('input-perolehans/media', 'InputPerolehanController@storeMedia')->name('input-perolehans.storeMedia');
    Route::post('input-perolehans/ckmedia', 'InputPerolehanController@storeCKEditorImages')->name('input-perolehans.storeCKEditorImages');
    Route::post('input-perolehans/parse-csv-import', 'InputPerolehanController@parseCsvImport')->name('input-perolehans.parseCsvImport');
    Route::post('input-perolehans/process-csv-import', 'InputPerolehanController@processCsvImport')->name('input-perolehans.processCsvImport');
    Route::resource('input-perolehans', 'InputPerolehanController');

    // Bank
    Route::delete('banks/destroy', 'BankController@massDestroy')->name('banks.massDestroy');
    Route::resource('banks', 'BankController');

    // Verified Status
    Route::delete('verified-statuses/destroy', 'VerifiedStatusController@massDestroy')->name('verified-statuses.massDestroy');
    Route::resource('verified-statuses', 'VerifiedStatusController');

    // Verifikasi Perolehan
    Route::delete('verifikasi-perolehans/destroy', 'VerifikasiPerolehanController@massDestroy')->name('verifikasi-perolehans.massDestroy');
    Route::resource('verifikasi-perolehans', 'VerifikasiPerolehanController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Top Ten Anggota
    Route::delete('top-ten-anggota/destroy', 'TopTenAnggotaController@massDestroy')->name('top-ten-anggota.massDestroy');
    Route::resource('top-ten-anggota', 'TopTenAnggotaController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
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
