<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Inertia\Inertia;

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
    return redirect()->to(\route('dashboard', ['lang' => 'eng']));
});;

Route::group(['prefix'=>'{lang}'], function(){
    Route::match(['POST','GET'], 'change/password', [\App\Http\Controllers\UserManagement\UserController::class, 'change_password'])->name('change.password')->middleware(['auth']);

    Route::middleware(['auth', 'check_user', 'lang' ])->group(function (){
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::get('/test', [\App\Http\Controllers\TestController::class, 'test'])->name('test');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        /*************************************** User management routes ****************************************/
        Route::group(['prefix' => 'user/management'], function (){
            Route::get('/', function(){
                User::isAllowed('user-management-access');
                return Inertia::render('UserManagement/UserManagementIndex');
            })->name('user-management.index');

            /********************************** Users routes ********************************/
            Route::resource('users', \App\Http\Controllers\UserManagement\UserController::class);

            /*************************************** Role routes *****************************************/
            Route::resource('role', \App\Http\Controllers\UserManagement\RoleController::class);
            Route::match(['POST', 'PUT', 'DELETE'],'save/role/group', [\App\Http\Controllers\UserManagement\RoleController::class, 'saveRoleGroup'])->name('role.group.save');


            /****************************************** Login log ***************************************/
            Route::resource('login_log', \App\Http\Controllers\UserManagement\LoginLogController::class);


            /******************************************* Log activities ************************************/
            Route::get('log/activities', [\App\Http\Controllers\UserManagement\LogActivityController::class, 'index'])->name('log.activities.index');
            Route::post('log/activity/restore/{type}', [\App\Http\Controllers\UserManagement\LogActivityController::class, 'restore'])->name('log.activities.restore');
            Route::delete('delete/log/activity/{activity}', [\App\Http\Controllers\UserManagement\LogActivityController::class, 'deleteLogActivity'])->name('destroy.activity');



            /*************************************** Permission routes ************************************/
            Route::resource('permissions', \App\Http\Controllers\UserManagement\PermissionsController::class);
            Route::post('save/permission', [\App\Http\Controllers\UserManagement\PermissionsController::class, 'savePermission'])->name('save-permission');
            Route::delete('delete/permission/{permission}', [\App\Http\Controllers\UserManagement\PermissionsController::class, 'deletePermission'])->name('delete-permission');


            /******************************************* Helper routes **********************************/
            Route::post('download/pdf', [\App\Http\Controllers\HelperController::class, 'downloadPdf'])->name('download.pdf');


        });

        /**************************************** Configuration routes ***********************************************/
        Route::group(['prefix'=>'configuration'], function(){
            Route::get('/', function(){
                User::isAllowed('configuration-access');
                return Inertia::render('Configuration/ConfigurationIndex');
            })->name('configuration.index');

            /************************************* Language routes ********************************************/
            Route::resource('language', \App\Http\Controllers\Configurations\LanguageController::class);
            Route::get('get/language/words', [\App\Http\Controllers\Configurations\LanguageController::class, 'returnAllWords']);
            Route::resource('language/dictionary', \App\Http\Controllers\Configurations\LanguageDictionaryController::class);

            /**************************************** backup routes ********************************************/
            Route::get('backup', [\App\Http\Controllers\Configurations\BackupController::class, 'index'])->name('backup.index');

            /**************************************** Auditor team routes *******************************************/
            Route::resource('auditor-team', \App\Http\Controllers\Configurations\AuditorTeamController::class);

            /************************************** Auditor team members routes ********************************/
            Route::resource('auditor-members', \App\Http\Controllers\Configurations\AuditorMemberController::class);

            /************************************ Confidentiality level routes **********************************/
            Route::resource('confidentiality-level', \App\Http\Controllers\Configurations\ConfidentialityLevelController::class);

            /************************************ Application settings **********************************/
            Route::prefix('application/settings')->group(function(){
                Route::get('/', function (){
                    User::isAllowed('application-settings-access');
                    return Inertia::render('Configuration/ApplicationSettings/ApplicationSettingsIndex', [
                        'active' => 'application-settings',
                        'users' => Inertia::lazy(fn () => User::all())
                    ]);
                })->name('application.settings.index');
                Route::resource('allowed-extensions', \App\Http\Controllers\Configurations\ApplicationSettings\AllowedExtentionsController::class);
            });
        });

        /******************************************* Normal Audit routes ********************************************/
        Route::resource('normal-audit', \App\Http\Controllers\NormalAudit\NormalAuditController::class);
        Route::post('process/normal/audit/{normal_audit_id}/{type}', [\App\Http\Controllers\NormalAudit\NormalAuditController::class ,'processNormalAudit'])->name('normal-audit.process');
        Route::get('audit/file/download/{id}/{type}', [\App\Http\Controllers\AuditFileController::class, 'download'])->name('audit.file.download');
    });

});

require __DIR__.'/auth.php';
