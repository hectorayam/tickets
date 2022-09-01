<?php

use App\Models\Project;
use App\Models\Category;
use App\Models\Company;
use App\Models\Report;
use App\Models\StatusReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;



use phpDocumentor\Reflection\Types\Resource_;

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

Route::get('/', function () {
    $reports = Report::join('status_reports','status_reports.id','=','reports.status_id')
                        ->where('status_reports.name','=','Terminado')
                        ->select('reports.*')
                         ->get();
    $nuevos = Report::join('status_reports','status_reports.id','=','reports.status_id')
                        ->where('status_reports.name','=','Nuevo')
                        ->orWhere('status_reports.name','=','Aceptado')
                        ->orWhere('status_reports.name','=','En proceso')
                        ->orWhere('status_reports.name','=','Revision' )
                        ->orWhere('status_reports.name','=','Re-abierto')
                        ->select('reports.*')
                         ->get();
    $projects =  Project::all();
    $companies = Company::all();   

    return view('welcome',compact('reports','projects','companies','nuevos'));
});
//Rutas de Proyecto
Route::get('/yours-projects', [App\Http\Controllers\ProjectController::class, 'yours'])->name('projects.yours');
Route::get('/project', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::get('/project/client', [App\Http\Controllers\ProjectController::class, 'prop'])->name('projects.prop');
Route::get('/project/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('projects.create');
Route::get('/project/proposal', [App\Http\Controllers\ProjectController::class, 'client'])->name('projects.client');
Route::post('/projects', [App\Http\Controllers\ProjectController::class, 'proposal'])->name('projects.p');
Route::post('/project', [App\Http\Controllers\ProjectController::class, 'store'])->name('projects.store');
Route::get('/project/{project}', [App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');
Route::get('/project/{project}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/project/{project}', [App\Http\Controllers\ProjectController::class, 'update'])->name('projects.update');
Route::delete('/project/{project}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('projects.delete');
Route::get('/project/remove-image/{id}',[App\Http\Controllers\ProjectController::class,'removeImg']);


//Rutas de Reporte
Route::get('/yours-reports', [App\Http\Controllers\ReportController::class, 'yours'])->name('reports.yours');
Route::get('/report', [App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
Route::get('/report/create', [App\Http\Controllers\ReportController::class, 'create'])->name('reports.create');
Route::post('/report', [App\Http\Controllers\ReportController::class, 'store'])->name('reports.store');
Route::get('/report/{report}', [App\Http\Controllers\ReportController::class, 'show'])->name('reports.show');
Route::get('/report/{report}/edit', [App\Http\Controllers\ReportController::class, 'edit'])->name('reports.edit');
Route::put('/report/{report}', [App\Http\Controllers\ReportController::class, 'update'])->name('reports.update');
Route::delete('/report/{report}', [App\Http\Controllers\ReportController::class, 'destroy'])->name('reports.delete');

//Rutas de tarea
Route::get('/yours-tasks', [App\Http\Controllers\TaskController::class, 'yours'])->name('tasks.yours');
Route::get('/task', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
Route::get('/task/create', [App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');
Route::post('/task', [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
Route::get('/task/{task}', [App\Http\Controllers\TaskController::class, 'show'])->name('tasks.show');
Route::get('/task/{task}/edit', [App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/task/{task}', [App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
Route::delete('/task/{task}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.delete');

Route::get('/status', [App\Http\Controllers\HomeController::class, 'status'])->name('menu');
Route::get('/status/report/create', [App\Http\Controllers\StatusReportController::class, 'create'])->name('statusr.create');
Route::post('/status/report', [App\Http\Controllers\StatusReportController::class, 'store'])->name('statusr.store');
Route::get('/status/report/{status}/edit', [App\Http\Controllers\StatusReportController::class, 'edit'])->name('statusr.edit');
Route::put('/status/report/{status}', [App\Http\Controllers\StatusReportController::class, 'update'])->name('statusr.update');
Route::delete('/status/report/{status}', [App\Http\Controllers\StatusReportController::class, 'destroy'])->name('statusr.delete');

Route::get('/status/task/create', [App\Http\Controllers\StatusTaskController::class, 'create'])->name('statust.create');
Route::post('/status/task', [App\Http\Controllers\StatusTaskController::class, 'store'])->name('statust.store');
Route::get('/status/task/{status}/edit', [App\Http\Controllers\StatusTaskController::class, 'edit'])->name('statust.edit');
Route::put('/statust/task/{status}', [App\Http\Controllers\StatusTaskController::class, 'update'])->name('statust.update');
Route::delete('/status/task/{status}', [App\Http\Controllers\StatusTaskController::class, 'destroy'])->name('statust.delete');

Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{category}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{status}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{category}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.delete');

Route::resource('permission', App\Http\Controllers\PermissionController::class);
Route::resource('role', App\Http\Controllers\RoleController::class);
Route::resource('company', App\Http\Controllers\CompanyController::class);
//Rutas de usuario

// ['role:cliente']
Route::group(['middleware'=>'auth'],function(){
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');


});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/profile/{user}', [App\Http\Controllers\HomeController::class, 'auth'])->name('perfil');
Route::put('/profiles/{user}', [App\Http\Controllers\HomeController::class, 'update'])->name('perfil.update');

