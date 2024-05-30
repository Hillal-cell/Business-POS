<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ProductcategoryController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpensecategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StocklistController;
use App\Http\Controllers\CoreproductController;
use App\Http\Controllers\StockcartController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeavesummaryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PurchasecartController;
use App\Http\Controllers\PurchasereportController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\FlyroleController;
use App\Http\Controllers\SaleslistController;
use App\Http\Controllers\ToastyController;
use App\Http\Controllers\UserpermissionController;
use App\Http\Controllers\SalesreportController;
use App\Http\Controllers\StockreportController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChangepasswordController;
use App\Http\Controllers\ClockController;


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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard',  [DashboardController::class,'ind'])->middleware(['auth'])->name('dashboard');


Route::get('/', function () {
    return view('auth/login');
});
Route::get('/dashboard',  [DashboardController::class,'dashboard'])->middleware(['auth'])->name('dashboard');
Route::post('/dashboard',  [DashboardController::class,'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/connect',  [DashboardController::class,'con'])->middleware(['auth'])->name('con');
Route::get('/admin',  [DashboardController::class,'admins'])->name('admin');


// Route::get('/get-text/{id}', 'MyController@getText');
Route::post('/getText', [DashboardController::class, 'dash']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Superadmin
Route::resource('business', BusinessController::class)->middleware('auth');

Route::resource('message', MessageController::class)->middleware('auth');
Route::get('/clearmsg', [MessageController::class, 'clearmessage'])->name('clearmsg')->middleware('auth');





//Products
Route::resource('products', ProductController::class)->middleware('auth');
Route::post('validateproduct', [ProductController::class, 'validateproduct'])->middleware('auth');
Route::post('/searchproduct', [ProductController::class, 'search'])->name('searchproduct')->middleware('auth');
Route::get('exportproduct/', [ProductController::class, 'export'])->name('exportproduct')->middleware('auth');


Route::resource('toasty', ToastyController::class);
Route::get('internet-status', [ToastyController::class, 'check']);


//Product Category
Route::resource('productcategory', ProductcategoryController::class)->middleware('auth');;
Route::post('validateproductcategory', [ProductcategoryController::class, 'validateproductcategory'])->middleware('auth');
Route::post('/searchcategory', [ProductcategoryController::class, 'search'])->name('searchcategory')->middleware('auth');
Route::get('exportproductcategory/', [ProductcategoryController::class, 'export'])->name('exportproductcategory')->middleware('auth');

//Barcode
Route::resource('barcode', BarcodeController::class)->middleware('auth');



//Leave
Route::resource('leave', LeaveController::class)->middleware('auth');
Route::get('/leavey/{id}', [LeaveController::class, 'getLeave'])->middleware('auth');
Route::get('exportleave/', [LeaveController::class, 'export'])->name('exportleave')->middleware('auth');

//Leavesummary
Route::resource('leavesummary', LeavesummaryController::class)->middleware('auth');


//Expenses
Route::resource('expense', ExpenseController::class)->middleware('auth');
Route::get('exportexpense/', [ExpenseController::class, 'export'])->name('exportexpense')->middleware('auth');
Route::post('/searchexpense', [ExpenseController::class, 'search'])->name('searchexpense')->middleware('auth');


//Expensecategory
Route::resource('expensecategory', ExpensecategoryController::class)->middleware('auth');
Route::post('/validateexpensecategory', [ExpensecategoryController::class, 'validateexpensecategory'])->name('searchexpensecategory')->middleware('auth');
Route::post('/searchexpensecategory', [ExpensecategoryController::class, 'search'])->name('searchexpensecategory')->middleware('auth');
Route::post('/expend/{id}', [ExpensecategoryController::class, 'destroym'])
->middleware('auth');


//Supplier
Route::resource('supplier', SupplierController::class)->middleware('auth');
Route::post('/searchsupplier', [SupplierController::class, 'search'])->name('searchsupplier')->middleware('auth');
Route::get('exportsupplier/', [SupplierController::class, 'export'])->name('exportsupplier')->middleware('auth');
Route::post('/import',[SupplierController::class,'import'])->name('import');
Route::get('/file-import',[SupplierController::class,'importView'])->name('import-view');


//Staff
Route::resource('staff', StaffController::class)->middleware('auth');
Route::post('/user', [StaffController::class, 'users'])->name('users')->middleware('auth');
Route::post('/searchstaff', [StaffController::class, 'search'])->name('searchstaff')->middleware('auth');
Route::get('exportstaff/', [StaffController::class, 'export'])->name('exportstaff')->middleware('auth');
Route::post('enroll/{id}', [StaffController::class, 'enroll'])->name('enroll')->middleware('auth');
Route::post('validatestaff', [StaffController::class, 'validatestaff'])->middleware('auth');


//Units
Route::resource('unit', UnitController::class)->middleware('auth');
Route::get('exportunit/', [UnitController::class, 'export'])->name('exportunit')->middleware('auth');
Route::post('/searchunit', [UnitController::class, 'search'])->name('searchunit')->middleware('auth');
Route::post('validateunit', [UnitController::class, 'validateunit'])->middleware('auth');
Route::post('validatesymbol', [UnitController::class, 'validateunit'])->middleware('auth');

//Stock
Route::resource('stock', StockController::class)->middleware('auth');


//Batch
Route::resource('batch', BatchController::class)->middleware('auth');




//Stocklist
Route::resource('stocklist', StocklistController::class)->middleware('auth');
Route::post('/searchstocklist', [StocklistController::class, 'search'])->name('searchstocklist')->middleware('auth');

//Stock
Route::resource('stockcart', StockcartController::class)->middleware('auth');

//Cart
Route::resource('cart', CartController::class)->middleware('auth');

//Purchasecarts
Route::resource('purchasecart', PurchasecartController::class)->middleware('auth');
Route::resource('purchase', PurchaseController::class)->middleware('auth');
Route::resource('purchasereport', PurchasereportController::class)->middleware('auth');
//Sales
Route::resource('sale', SalesController::class)->middleware('auth');
Route::resource('salelist', SaleslistController::class)->middleware('auth');
Route::post('/searchsale', [SaleslistController::class, 'search'])->name('searchsale')->middleware('auth');
Route::post('/filtering', [SaleslistController::class, 'searches'])->name('filtering')->middleware('auth');
Route::post('receipt/', [SalesController::class, 'printbtn'])->name('receipt')->middleware('auth');
Route::get('receipt/', [SalesController::class, 'receipt'])->name('receipt')->middleware('auth');

//Userpermission
Route::resource('userpermission', UserpermissionController::class)->middleware('auth');
Route::post('validaterole', [UserpermissionController::class, 'validaterole'])->middleware('auth');


//Salesreport
Route::resource('salesreport', SalesreportController::class)->middleware('auth');

Route::post('/searchsalereport', [SalesreportController::class, 'search'])->name('searchsalereport')->middleware('auth');
Route::get('exportsalereport/', [SalesreportController::class, 'export'])->name('exportsalereport')->middleware('auth');

//Stockreport
Route::resource('stockreport', StockreportController::class)->middleware('auth');
Route::post('/searchstockreport', [StockreportController::class, 'search'])->name('searchstockreport')->middleware('auth');
Route::get('exportstockreport/', [StockreportController::class, 'export'])->name('exportstockreport')->middleware('auth');
Route::get('getSubCatAgainstMainCatEdit/{id}', [StockcartController::class, 'getSubCatAgainstMainCatEdit'])->middleware('auth');
Route::get('quantityavailable/{id}', [StockcartController::class, 'quantity'])->middleware('auth');

//Audits
Route::get('/audits', [DashboardController::class, 'fetchaudits'])->name('audits')
->middleware('auth');
Route::get('/image', [DashboardController::class, 'imi'])->name('image')->middleware('auth');


Route::resource('changepassword', ChangepasswordController::class)->middleware('auth');



//Roles
Route::resource('role', FlyroleController::class)->middleware('auth');
Route::post('/searchrole', [FlyroleController::class, 'search'])->name('searchrole')->middleware('auth');


//Filter products by category
Route::post('/filterproduct', [ProductController::class, 'filter'])->name('filterproduct')->middleware('auth');



Route::post('/searchaudit', [DashboardController::class, 'search'])->name('searchaudit')->middleware('auth');
Route::post('/filter', [ExpenseController::class, 'searches'])->name('filter')->middleware('auth');



// Route::post('/filter', [SaleslistController::class, 'searches'])->name('filter')->middleware('auth');

Route::resource('save_task', TaskController::class)->middleware('auth');



Route::resource('coreproduct', CoreproductController::class)->middleware('auth');



Route::resource('clock', ClockController::class)->middleware('auth');;


// Route::get('/upload', [PurchaseController::class, 'index'])->name('upload');

// Route::post('/upload', [PurchaseController::class, 'upload'])->name('upload')->middleware('auth');


require __DIR__.'/auth.php';
