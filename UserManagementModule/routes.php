<?php

use Illuminate\Support\Facades\Route;
use UserManagementModule\Controllers\RoleController;
use UserManagementModule\Controllers\UserManagementController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'api/users'
], function () {
    Route::get('', [UserManagementController::class, 'allUsers']);
    Route::delete('/{userId}', [UserManagementController::class, 'removeUser']);

    Route::post('/onUserRole', [UserManagementController::class, 'addRoleForUser']);
    Route::post('/offUserRole', [UserManagementController::class, 'removeRoleForUser']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'api/roles'
], function () {
    Route::post('', [RoleController::class, 'create']);
    Route::get('', [RoleController::class, 'allRoles']);
    Route::post('/update', [RoleController::class, 'update']);
    Route::delete('', [RoleController::class, 'delete']);
});
