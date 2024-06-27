<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PkwtController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EsignController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AddendumController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\QuantityController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\AgreementController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AccounttypeController;
use App\Http\Controllers\ItemRequestController;
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
Route::get('/mobiles', [HomeController::class, 'welcomeMobile']);

Route::get('/karir', [DashboardController::class, 'karir'])->name('karir');
Route::get('/karir/{id}', [DashboardController::class, 'karirDetail'])->name('karir-detail');
// Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');
    
Route::middleware('auth', 'visitor')->group(function () {
    Route::get('/mobiles/home', [HomeController::class, 'homeMobile']);
    Route::get('/mobiles/iform', [HomeController::class, 'iform'])->name('iform');
    Route::get('/mobiles/hris', [HomeController::class, 'hris'])->name('hris');
    Route::get('/mobiles/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/mobiles/scan', [HomeController::class, 'scan'])->name('scan');
    Route::get('/mobiles/warehouse', [HomeController::class, 'warehouse'])->name('warehouse');
    Route::get('/mobiles/warehouse/item-request', [HomeController::class, 'itemreq'])->name('itemreq');
    
    
    Route::resource('dashboard', DashboardController::class);

    Route::get('/register-profile', [ProfileController::class, 'registerProfile']);
    Route::get('/employee/list', [EmployeeController::class, 'index'])->name('employee.index');
    Route::delete('employee/list/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

    Route::get('/jobportal', [DashboardController::class, 'jobPortal'])->name('jobportal');
    Route::get('/pkwt', [DashboardController::class, 'pkwt'])->name('pkwt-show');
    Route::get('/show-document', [DashboardController::class, 'document'])->name('document-show');
    Route::get('/my-resume', [DashboardController::class, 'MyResume'])->name('my-resume');
    Route::get('/jobportal/{career}', [DashboardController::class, 'jobDetail'])->name('jobportal-show');
    Route::get('/history', [DashboardController::class, 'history'])->name('history');

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    Route::resource('users', UserController::class);
    Route::post('/import-user',[UserController::class,'import'])->name('import-user');
    Route::delete('/delete-user-profiles', [UserController::class, 'userProfileDestroy'])->name('user.profile.destroy');

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
    Route::get('/candidates/{candidate}',[CandidateController::class,'show'])->name('candidates.show');

    Route::put('/update-qrcode/{id}',[CandidateController::class,'QRUpdate'])->name('update-qrcode');
    Route::put('/update-qrcode-user/{id}',[userController::class,'QRUpdate'])->name('update-qrcode-user');
   
    Route::resource('pkwts', PkwtController::class);
    Route::post('pkwt/store', [PkwtController::class, 'storeFromCandidate'])->name('pkwt-candidate');
    Route::post('/import-pkwt',[PkwtController::class,'import'])->name('import-pkwt');

    Route::resource('signatures', SignatureController::class);
    Route::post ('signature/upload',[SignatureController::class, 'upload'])->name('upload-signature');
    Route::resource('esigns', EsignController::class);
    Route::resource('addendums', AddendumController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('applicants', ApplicantController::class);
    Route::resource('sites', SiteController::class);
    Route::resource('products', ProductController::class);
    Route::resource('quantities', QuantityController::class);
    Route::resource('documents', DocumentController::class);

    Route::resource('agreements', AgreementController::class);
    Route::post('/import-agreement',[AgreementController::class,'import'])->name('import-agreement');
    Route::post('/import-pkwt-all',[AgreementController::class,'importAll'])->name('import-agreement-all');
    Route::post('/approve-by-project',[PkwtController::class,'approveByProject'])->name('approve-by-project');

    Route::get ('training/gnc',[TrainingController::class, 'indexGNC'])->name('index-gnc');
    Route::get ('training/ncc',[TrainingController::class, 'indexNCC'])->name('index-ncc');
    Route::get ('training/pending',[TrainingController::class, 'indexpending'])->name('index-pending');
    Route::get ('training/reject',[TrainingController::class, 'indexReject'])->name('index-reject');
    Route::get ('training/interview-user',[TrainingController::class, 'indexInterview'])->name('index-interview');
    Route::get ('training/document/{candidate}',[TrainingController::class, 'showDoc'])->name('document-print');

    Route::get ('attendance',[AttendanceController::class, 'attendance'])->name('attendance');
    Route::get ('attendance/clock-in',[AttendanceController::class, 'indexClockIn'])->name('index.clock-in');
    Route::post ('attendance/clock-in/set',[AttendanceController::class, 'clockIn'])->name('clock-in');
    Route::get ('attendance/clockout',[AttendanceController::class, 'indexClockOut'])->name('index.clock-out');
    Route::post ('attendance/clock-out/set',[AttendanceController::class, 'clockOut'])->name('clock-out');

    Route::post('/add-to-cart',[DashboardController::class, 'addToCart'])->name('cart-add');

    Route::get ('/item-request',[ItemRequestController::class, 'index'])->name('item-request');
    Route::get ('/all-item',[ItemRequestController::class, 'allItem'])->name('all-item');
    Route::get ('/show/{id}/item',[ItemRequestController::class, 'show'])->name('show-item');
    Route::get ('/edit/{id}/item',[ItemRequestController::class, 'edit'])->name('edit-item');
    Route::post('/add-cart',[ItemRequestController::class, 'addToCart'])->name('add-cart');
    Route::put('/carts/{id}', [ItemRequestController::class, 'updateCart'])->name('update-cart');
    Route::delete('/delete-cart/{id}',[itemRequestController::class, 'deleteCart'])->name('delete-cart');
    Route::post('/import-item',[ItemRequestController::class,'import'])->name('import-item');

    Route::get ('/item-add',[ItemRequestController::class, 'create'])->name('item-request-add');
    Route::post('/item-store',[ItemRequestController::class, 'store'])->name('item-request-store');

    Route::get ('/catalog',[DashboardController::class, 'catalog'])->name('catalog');
    Route::get ('/cart',[DashboardController::class, 'cart'])->name('cart');
    Route::post('/add-to-item-request',[DashboardController::class, 'itemReq'])->name('item-add');


});

require __DIR__.'/auth.php';
