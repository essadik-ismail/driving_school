<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/notifications', [Controllers\NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/read/{id}', [Controllers\NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/store', [Controllers\NotificationController::class, 'addNotification'])->name('notifications.store');

    Route::prefix('profile')
        ->name('profile.')
        ->controller(Controllers\ProfileController::class)
        ->group(
            function () {
                Route::get('/', 'index')->name('index');
                Route::get('/invoice', 'getInvoice')->name('getInvoice');
                Route::post('/profile', 'profile')->name('settings');
                Route::post('/tennat', 'tenant')->name('tenant');
                Route::post('/pwd', 'pwd')->name('pwd');
                Route::post('/invoice', 'invoice')->name('invoice');
            }
        );


    Route::prefix('user')
        ->group(
            function () {
                Route::prefix('tenantjobs')
                    ->name('tenantjobs.')
                    ->controller(Controllers\TenantJobController::class)
                    ->group(
                        function () {
                            Route::get('/', 'index')->name('index');
                            Route::get('/create', 'create')->name('create');
                            Route::post('/store', 'store')->name('store');
                            Route::get('/show/{tenantJob}', 'show')->name('show');
                            Route::post('/update/{tenantJob}', 'update')->name('update');
                            Route::post('/import', 'import')->name('import');
                        }
                    );

                Route::prefix('employees')
                    ->name('employees.')
                    ->controller(Controllers\EmployeeController::class)
                    ->group(
                        function () {
                            Route::get('/', 'index')->name('index');
                            Route::get('/create', 'create')->name('create');
                            Route::post('/store', 'store')->name('store');
                            Route::get('/show/{employee}', 'show')->name('show');
                            Route::post('/update/{employee}', 'update')->name('update');
                            Route::post('/import', 'import')->name('import');
                        }
                    );
            }
        );


    Route::prefix('crm')
        ->group(
            function () {
                Route::prefix('customers')
                    ->name('customers.')
                    ->controller(Controllers\CustomerController::class)
                    ->group(
                        function () {
                            Route::get('/', 'index')->name('index');
                            Route::get('/create', 'create')->name('create');
                            Route::post('/store', 'store')->name('store');
                            Route::get('/show/{customer}', 'show')->name('show');
                            Route::post('/update/{customer}', 'update')->name('update');
                            Route::post('/import', 'import')->name('import');
                        }
                    );
            }
        );

    Route::prefix('settings')
        ->group(
            function () {
                Route::prefix('subscriptionplans')
                    ->name('subscriptionplans.')
                    ->controller(Controllers\SubscriptionPlanController::class)
                    ->group(
                        function () {
                            Route::get('/', 'index')->name('index');
                            Route::get('/create', 'create')->name('create');
                            Route::post('/store', 'store')->name('store');
                            Route::get('/show/{subscriptionPlan}', 'show')->name('show');
                            Route::post('/update/{subscriptionPlan}', 'update')->name('update');
                            Route::post('/import', 'import')->name('import');
                        }
                    );

                Route::prefix('tenants')
                    ->name('tenants.')
                    ->controller(Controllers\TenantController::class)
                    ->group(
                        function () {
                            Route::get('/', 'index')->name('index');
                            Route::get('/create', 'create')->name('create');
                            Route::post('/store', 'store')->name('store');
                            Route::get('/show/{tenant}', 'show')->name('show');
                            Route::post('/update/{tenant}', 'update')->name('update');
                            Route::post('/import', 'import')->name('import');
                        }
                    );
            }
        );
});
