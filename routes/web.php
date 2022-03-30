<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\UsersController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
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

Route::get('/',[HomeController::class,'returnHome']);
Route::get('/header-Hidden',[HomeController::class,'returnCategory']);
Route::get('/login',[UsersController::class,'returnLogin']);
Route::get('/register',[UsersController::class,'returnRegister']);
Route::get('/contact',[ContactController::class,'returnContact']);


#Register User to E-Shop
Route::post('/doRegister',[UsersController::class,'DoRegister']);


#Login Section Start
Route::post('/doLogin',[UsersController::class,'DoLogin']);


#User auth middleware For checking user Is Logged in Or not
Route::group(['middleware'=>'userauth'],function(){
    Route::get('/logout',[UsersController::class,'DoLogout']);
    Route::get('/cart',[CartController::class,'returnCart']);
    Route::POST('AddCart',[CartController::class,'Cartadd']);
    Route::POST('updateCart',[CartController::class,'cartUpdate']);
    Route::get('/checkout',[CheckoutController::class,'returnCheckout']);
    Route::POST('getOrder',[CheckoutController::class,'CheckOut']);
});



#Admin Section Start Here

Route::get('/E-Shop-Admin',function(){
    return view('Admin.layout.admin_login');
});
Route::post('/adminLogin',[AdminLoginController::class,'AdminAuth']);
Route::group(['middleware'=>'isadmin'],function () {
Route::get('/AdminLogout',[AdminLoginController::class,'logoutAdmin']);
Route::get('/dashboard',[AdminController::class,'returnAdmin']);
Route::get('/category_add',[AdminController::class,'returnCategory']);
Route::get('/categories',[AdminController::class,'Categories']);
Route::get('/product',[AdminController::class,'returnProduct']);
Route::get('/products',[AdminController::class,'returnProducts']);
Route::post('/addCategory',[AdminController::class,'AddCategory']);
Route::post('/addProduct',[AdminController::class,'productAdd']);
Route::get('deleteProduct/{id}',[AdminController::class,'DeleteProduct']);
Route::get('deleteCategory/{id}',[AdminController::class,'categoryDelete']);
Route::get('EditProduct/{id}/{category_id}',[AdminController::class,'editProduct']);
Route::get('editCategory/{id}',[AdminController::class,'CategoryEdit']);
Route::post('/updateProduct',[AdminController::class,'productUpdate']);
Route::post('/updateCategory',[AdminController::class,'CategoryUpdate']);
Route::get('/Orders',[AdminController::class,'returnOrders']);
Route::get('approveOrder/{id}',[AdminController::class,'OrderAprrove']);
Route::get('cancelOrder/{id}',[AdminController::class,'orderCancel']);

});



