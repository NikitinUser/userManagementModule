<?php 
use Illuminate\Support\Facades\Route;


/**
 * Users
 */
Route::get('/getPageAllUsers', [UsersController::class, 'getPageAllUsers'])->name('getPageAllUsers')->middleware('web');
Route::get('/getPageAddNewUser', [UsersController::class, 'getPageAddNewUser'])->name('getPageAddNewUser')->middleware('web');
Route::get('/getPageUserInfo', [UsersController::class, 'getPageUserInfo'])->name('getPageUserInfo')->middleware('web');

Route::post('addUser', [UsersController::class, 'addNewUser'])->middleware('web');
Route::post('removeUser', [UsersController::class, 'removeUser'])->middleware('web');

Route::post('changeRoleUser', [UsersController::class, 'changeRoleUser'])->middleware('web');


 /**
 * Roles
 */
Route::get('/getPageAllRoles', [UsersController::class, 'getPageAllRoles'])->name('getPageAllRoles')->middleware('web');
Route::get('/getPageAddRole', [UsersController::class, 'getPageAddRole'])->name('getPageAddRole')->middleware('web');
Route::get('/getPageEditRole', [UsersController::class, 'getPageEditRole'])->name('getPageEditRole')->middleware('web');

Route::post('addRole', [UsersController::class, 'addRole'])->middleware('web');
Route::post('editRole', [UsersController::class, 'editRole'])->middleware('web');
Route::post('daleteRole', [UsersController::class, 'daleteRole'])->middleware('web');

Route::post('changePermissionRole', [UsersController::class, 'changePermissionRole'])->middleware('web');


 /**
 * Permissions
 */
Route::get('/getPageAllPermissions', [UsersController::class, 'getPageAllPermissions'])->name('getPageAllPermissions')->middleware('web');
Route::get('/getPageAddPermission', [UsersController::class, 'getPageAddPermission'])->name('getPageAddPermission')->middleware('web');
Route::get('/getPageEditPermission', [UsersController::class, 'getPageEditPermission'])->name('getPageEditPermission')->middleware('web');

Route::post('addPermission', [UsersController::class, 'addPermission'])->middleware('web');
Route::post('editPermission', [UsersController::class, 'editPermission'])->middleware('web');
Route::post('deletePermission', [UsersController::class, 'deletePermission'])->middleware('web');