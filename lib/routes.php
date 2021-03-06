<?php 
use Illuminate\Support\Facades\Route;
use NikitinUser\userManagementModule\lib\Controllers\RoleController;
use NikitinUser\userManagementModule\lib\Controllers\PermissionController;
use NikitinUser\userManagementModule\lib\Controllers\UserManagementController;

/**
 * Users
 */
Route::get('/getPageAllUsers', [UserManagementController::class, 'getPageAllUsers'])->name('getPageAllUsers')->middleware('web');
Route::get('/getAllUsers', [UserManagementController::class, 'getAllUsers'])->name('getAllUsers')->middleware('web');
Route::post('removeUser', [UserManagementController::class, 'removeUser'])->middleware('web');

Route::post('onUserRole', [UserManagementController::class, 'addRoleForUser'])->middleware('web');
Route::post('offUserRole', [UserManagementController::class, 'removeRoleForUser'])->middleware('web');


 /**
 * Roles
 */
Route::get('/getPageUsersRoles', [RoleController::class, 'getPageUsersRoles'])->name('getPageUsersRoles')->middleware('web');
Route::get('/getUsersRoles', [RoleController::class, 'getRolesForUser'])->name('getUsersRoles')->middleware('web');

Route::get('/getPageAddRole', [RoleController::class, 'getPageAddRole'])->name('getPageAddRole')->middleware('web');
Route::get('/getPageEditRole', [RoleController::class, 'getPageEditRole'])->name('getPageEditRole')->middleware('web');
Route::get('/getRoleById', [RoleController::class, 'getRoleData'])->name('getRoleById')->middleware('web');

Route::post('addRole', [RoleController::class, 'addRole'])->middleware('web');
Route::post('editRole', [RoleController::class, 'editRole'])->middleware('web');
Route::post('deleteRole', [RoleController::class, 'deleteRole'])->middleware('web');


 /**
 * Permissions
 */
Route::get('/getPageAllRolesAndPermissions', [PermissionController::class, 'getPageAllRolesAndPermissions'])
    ->name('getPageAllRolesAndPermissions')
    ->middleware('web');

Route::get('/getAllRolesAndPermissions', [PermissionController::class, 'getAllRolesAndPermission'])
    ->name('getAllRolesAndPermissions')
    ->middleware('web');

Route::get('/getPageAddPermission', [PermissionController::class, 'getPageAddPermission'])->name('getPageAddPermission')->middleware('web');
Route::get('/getPageEditPermission', [PermissionController::class, 'getPageEditPermission'])->name('getPageEditPermission')->middleware('web');
Route::get('/getPermissionById', [PermissionController::class, 'getPermissionData'])->name('getPermissionById')->middleware('web');

Route::post('addPermission', [PermissionController::class, 'addPermission'])->middleware('web');
Route::post('editPermission', [PermissionController::class, 'editPermission'])->middleware('web');
Route::post('deletePermission', [PermissionController::class, 'deletePermission'])->middleware('web');

Route::post('onPermissionRole', [PermissionController::class, 'addPermissionForRole'])->middleware('web');
Route::post('offPermissionRole', [PermissionController::class, 'removePermissionForRole'])->middleware('web');

