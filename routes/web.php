<?php

use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\FriendController;


use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ActionTemplateController;
use App\Http\Controllers\PartialController;
use App\Http\Controllers\SchemaController;
use App\Http\Controllers\FormBuilderController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\YamlController;


use App\Models\Project;
use App\View\Components\Query;


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
    // $project = Project::all();
    return view('welcome');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::group([
        'prefix' => 'search',
        'as' => 'member_search_'
    ], function () {
        Route::get('f', [UserController::class, 'index'])->name('index');
        Route::get('/f/show/{id?}', [UserController::class, 'show'])->name('show');
        Route::get('/f/edit{id?}', [UserController::class, 'edit'])->name('edit');
        Route::get('/f/update{id?}', [UserController::class, 'update'])->name('update');
        Route::get('/f/delete{id?}', [UserController::class, 'delete'])->name('delete');
    });

    Route::group([
        'prefix' => 'friend',
        'as' => 'friend_'
    ], function () {
        Route::get('/', [FriendController::class, 'index'])->name('index');
        Route::get('/requestCreate/{id?}', [FriendController::class, 'requestCreate'])->name('requestCreate');
    });

    Route::group([
        'prefix' => 'project',
        'as' => 'project_'
    ], function () {
        Route::get('/p', [ProjectController::class, 'index'])->name('index');
        Route::get('/p/new', [ProjectController::class, 'create'])->name('create');
        Route::post('/p/store', [ProjectController::class, 'store'])->name('store');
        Route::get('/p/edit/{id}', [ProjectController::class, 'edit'])->name('edit');
        Route::get('/p/delete/{id}', [ProjectController::class, 'destroy'])->name('destroy');
        Route::put('/p/update/{id}', [ProjectController::class, 'update'])->name('update');
        Route::get('/p/show/{id}', [ProjectController::class, 'show'])->name('show');
    });

    Route::group([
        'prefix' => 'task',
        'as' => 'task_'
    ], function () {
        Route::get('/t', [TaskController::class, 'index'])->name('index');
        Route::get('/p/{project_id}/t/new', [TaskController::class, 'create'])->name('create');
        Route::post('/t/store', [TaskController::class, 'store'])->name('store');
        Route::get('/t/edit/{id}', [TaskController::class, 'edit'])->name('edit');
        Route::get('/t/delete/{id}', [TaskController::class, 'destroy'])->name('destroy');
        Route::put('/t/update/{id}', [TaskController::class, 'update'])->name('update');
        Route::get('/t/show/{id}', [TaskController::class, 'show'])->name('show');
    });

    Route::group([
        'prefix' => 'module',
        'as' => 'module_'
    ], function () {
        Route::get('/m', [ModuleController::class, 'index'])->name('index');
        Route::get('/p/{project_id}/t/{task_id}/m/new', [ModuleController::class, 'create'])->name('create');
        Route::post('/m/store', [ModuleController::class, 'store'])->name('store');
        Route::get('/m/edit/{id}', [ModuleController::class, 'edit'])->name('edit');
        Route::get('/m/delete/{id}', [ModuleController::class, 'destroy'])->name('destroy');
        Route::put('/m/update/{id}', [ModuleController::class, 'update'])->name('update');
    });

    Route::group([
        'prefix' => 'action',
        'as' => 'action_'
    ], function () {
        Route::get('/a', [ActionController::class, 'index'])->name('index');
        Route::get('/a/new', [ActionController::class, 'create'])->name('create');
        Route::post('/a/store', [ActionController::class, 'store'])->name('store');
        Route::get('/a/show/{id}', [ActionController::class, 'show'])->name('show');
        Route::get('/edit/t/{t_id}/a/{id}', [ActionController::class, 'edit'])->name('edit');
        Route::put('/a/update/{id}', [ActionController::class, 'update'])->name('update');
    });

    Route::group([
        'prefix' => 'temp',
        'as' => 'temp_'
    ], function () {
        Route::get('/a/{id}/tm/new', [ActionTemplateController::class, 'create'])->name('create');
        Route::post('/tm/store', [ActionTemplateController::class, 'store'])->name('store');
        Route::get('/tm/show/{id}', [ActionTemplateController::class, 'show'])->name('show');
        Route::get('/edit/tm/a/{a_id}/id/{id}', [ActionTemplateController::class, 'edit'])->name('edit');
        Route::put('/update/tm/a/{a_id}/id/{id}', [ActionTemplateController::class, 'update'])->name('update');
    });

    Route::group([
        'prefix' => 'componet',
        'as' => 'componet_'
    ], function () {
        Route::get('/comp', [ComponentController::class, 'index'])->name('index');
        Route::get('/comp/new', [ComponentController::class, 'create'])->name('create');
        Route::post('/comp/store', [ComponentController::class, 'store'])->name('store');
        Route::get('/comp/show/{id}', [ComponentController::class, 'show'])->name('show');
        Route::get('/edit/t/{t_id}/comp/{id}', [ComponentController::class, 'edit'])->name('edit');
        Route::put('/comp/update/{id}', [ComponentController::class, 'update'])->name('update');
    });

    Route::group([
        'prefix' => 'partial',
        'as' => 'partial_'
    ], function () {
        Route::get('/pa', [PartialController::class, 'index'])->name('index');
        Route::get('/pa/tm/{temp_id}/new', [PartialController::class, 'create'])->name('create');
        Route::post('/pa/tm/{temp_id}/store', [PartialController::class, 'store'])->name('store');
        Route::get('/pa/show/{id}', [PartialController::class, 'show'])->name('show');
        Route::get('/edit/t/{t_id}/pa/{id}', [PartialController::class, 'edit'])->name('edit');
        Route::put('/pa/update/{id}', [PartialController::class, 'update'])->name('update');
    });


    Route::group([
        'prefix' => 'schema',
        'as' => 'schema_'
    ], function () {
        Route::get('/', [SchemaController::class, 'index'])->name('index');
        Route::get('/t/{task_id}/a/{action_id}/new', [SchemaController::class, 'create'])->name('create');
        Route::post('/store', [SchemaController::class, 'store'])->name('store');
        Route::get('/show/{id}', [SchemaController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [SchemaController::class, 'edit'])->name('edit');
        Route::put('/sch/update/{id}', [SchemaController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [SchemaController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'prefix' => 'form',
        'as' => 'form_'
    ], function () {
        Route::get('/', [FormBuilderController::class, 'index'])->name('index');
        Route::get('/new', [FormBuilderController::class, 'create'])->name('create');
        Route::post('/store', [FormBuilderController::class, 'store'])->name('store');
        Route::get('/show/{id}', [FormBuilderController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [FormBuilderController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [FormBuilderController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [FormBuilderController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'prefix' => 'model',
        'as' => 'model_'
    ], function () {
        Route::get('/', [ModelController::class, 'index'])->name('index');
        Route::get('/new', [ModelController::class, 'create'])->name('create');
        Route::post('/store', [ModelController::class, 'store'])->name('store');
        Route::get('/show/{id}', [ModelController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [ModelController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ModelController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [ModelController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'prefix' => 'mail',
        'as' => 'mail_'
    ], function () {
        Route::get('/', [MailController::class, 'index'])->name('index');
        Route::get('/new', [MailController::class, 'create'])->name('create');
        Route::post('/store', [MailController::class, 'store'])->name('store');
        Route::get('/show/{id}', [MailController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [MailController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [MailController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [MailController::class, 'destroy'])->name('destroy');
    });

    Route::resource('yamls', YamlController::class);

});