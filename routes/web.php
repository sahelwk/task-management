<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskAssignToUserController;

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
    return view('auth.login');
});

Auth::routes(['register' =>false]);
// Auth::routes(['Auth']);
Route::middleware(['auth'])->group(function () {
    Route::get('/reports', [ReportController::class ,'index'])->name('reports.index');
    Route::get('/reports/generateReport', [ReportController::class ,'generateReport'])->name('reports.generateReport');
    Route::get('/reports/create', [ReportController::class ,'create'])->name('reports.create');
    Route::post('/reports/store', [ReportController::class ,'store'])->name('reports.store');

    Route::post('/mark-as-read', [HomeController::class ,'markNotification'])->name('Admin.markNotification');
    // organization
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/organization/index', [OrganizationController::class, 'index'])->name('organizations.index');
    Route::get('/organization/create', [OrganizationController::class, 'create'])->name('organizations.create');
    Route::post('/organization/store', [OrganizationController::class, 'store'])->name('organizations.store');
    Route::get('/organization/edit/{organization}', [OrganizationController::class, 'edit'])->name('organizations.edit');
    Route::post('/organization/update/{organization}', [OrganizationController::class, 'update'])->name('organizations.update');
    Route::get('/organization/show', [OrganizationController::class, 'show'])->name('organizations.show');
    Route::get('/organization/delete/{organization}', [OrganizationController::class, 'delete'])->name('organizations.delete');
    Route::get('/organization/showItem/{organization}', [OrganizationController::class, 'showItem'])->name('organizations.showItem');

//departments
Route::get('/department/index', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/department/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::get('/department/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::get('/department/show/{department}', [DepartmentController::class, 'show'])->name('departments.show');
Route::put('/department/update/{department}', [DepartmentController::class, 'update'])->name('departments.update');
Route::get('/department/delete/{department}', [DepartmentController::class, 'delete'])->name('departments.delete');
Route::post('/department/store', [DepartmentController::class, 'store'])->name('departments.store');

//projects
Route::get('/project/index', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/project/create', [ProjectController::class, 'create'])->name('projects.create');
Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
Route::get('/project/show/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/project/update/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/project/delete/{project}', [ProjectController::class, 'delete'])->name('projects.delete');
Route::post('/project/store', [ProjectController::class, 'store'])->name('projects.store');

//members
Route::get('/member/index', [MemberController::class, 'index'])->name('members.index');
Route::get('/member/create', [MemberController::class, 'create'])->name('members.create');
Route::get('/member/edit/{id}', [MemberController::class, 'edit'])->name('members.edit');
Route::get('/member/show/{member}', [MemberController::class, 'show'])->name('members.show');
Route::get('/member/update/{member}', [MemberController::class, 'update'])->name('members.update');
Route::delete('/member/delete/{member}', [MemberController::class, 'delete'])->name('members.delete');
Route::post('/member/store', [MemberController::class, 'store'])->name('members.store');

//tasks
Route::get('/task/index', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/task/create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
Route::get('/task/show/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/task/update/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::get('/task/delete/{task}', [TaskController::class, 'delete'])->name('tasks.delete');
Route::post('/task/store', [TaskController::class, 'store'])->name('tasks.store');

//setting
Route::get('/setting/security', [SettingController::class, 'index'])->name('settings.security');
Route::get('/setting/preference', [SettingController::class, 'index'])->name('settings.preferences');
Route::get('/setting/profile', [SettingController::class, 'index'])->name('settings.profile');
 //permissions

Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
Route::post('permissions', [PermissionController::class, 'store'])->name('permissions.store');
Route::get('permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::put('permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
Route::delete('permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
 //Roles

 Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
 Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
 Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store');
 Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
 Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update');
 Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
  //users
//   Route::get('users/index',[UserController::class ,'index'])->name('users.index');
//   Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
//   Route::post('/users', [UserController::class, 'store'])->name('users.store');

  //

  Route::get('/users', [UserController::class, 'index'])->name('users.index');
  Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
  Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
  Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
  Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
  Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
  Route::delete('/users/{user}', [UserController::class, 'delete'])->name('users.delete');



  Route::post('task_assign',[TaskAssignToUserController::class,'store'])->name('taskAssign.store');


//    Route::middleware(['auth','role:admin'])->group(function(){
//         //here is some route
//    });

// Route::controller(OrderController::class)->group(function () {
//     Route::get('/orders/{id}', 'show');
//     Route::post('/orders', 'store');
// });
// Route::prefix('admin')->group(function () {
//     Route::get('/users', function () {
//         // Matches The "/admin/users" URL
//     });
// Route::name('admin.')->group(function () {
//     Route::get('/users', function () {
//         // Route assigned name "admin.users"...
//     })->name('users');
// });





});
