<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PkwtController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EsignController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AddendumController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AccounttypeController;
use App\Http\Controllers\TaxcategoryController;
use App\Http\Controllers\ChartofaccountController;

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

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Route::get('/karir', [DashboardController::class, 'karir'])->name('karir');
Route::get('/karir/{id}', [DashboardController::class, 'karirDetail'])->name('karir-detail');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboardEmployee']);
    Route::get('/register-profile', [ProfileController::class, 'registerProfile']);
    Route::get('/employee/list', [EmployeeController::class, 'index'])->name('employee.index');
    Route::delete('employee/list/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

    Route::get('/jobportal', [DashboardController::class, 'jobPortal'])->name('jobportal');
    Route::get('/pkwt', [DashboardController::class, 'pkwt'])->name('pkwt-show');
    Route::get('/my-resume', [DashboardController::class, 'MyResume'])->name('my-resume');
    Route::get('/jobportal/{career}', [DashboardController::class, 'jobDetail'])->name('jobportal-show');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::post('/import-user',[UserController::class,'import'])->name('import-user');
    Route::resource('profiles', ProfileController::class);
    Route::post ('profiles',[ProfileController::class, 'updateUserDetail']);
    Route::get ('accountsettings',[ProfileController::class, 'indexAccountSettings']);

    Route::resource('cruds', CrudController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('taxcategories', TaxcategoryController::class);
    Route::resource('accounttypes', AccounttypeController::class);
    Route::resource('terms', TermController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('chartofaccounts', ChartofaccountController::class);
    Route::resource('vendors', VendorController::class);
    Route::resource('careers', CareerController::class);
    Route::resource('candidates', CandidateController::class);
    Route::put('/update-qrcode/{id}',[CandidateController::class,'QRUpdate'])->name('update-qrcode');
    Route::put('/update-qrcode-user/{id}',[userController::class,'QRUpdate'])->name('update-qrcode-user');
    Route::resource('pkwts', PkwtController::class);
    Route::post('/import-pkwt',[PkwtController::class,'import'])->name('import-pkwt');
    Route::resource('signatures', SignatureController::class);
    Route::resource('esigns', EsignController::class);
    Route::resource('addendums', AddendumController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('applicants', ApplicantController::class);

});

require __DIR__.'/auth.php';
