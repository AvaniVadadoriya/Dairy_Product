<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user;
use App\Http\Controllers\admin;
use App\Http\Controllers\deliveryboy;


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


Route::get('/', [user::class,'home']);
Route::get('/about', [user::class,'about']);

Route::get('/checkout',[user::class,'checkout']);
Route::any('/payment',[user::class,'payment']);

Route::get('/shop', [user::class,'shop']);

Route::get('/contactus', [user::class,'contactus']);
Route::post('/contact',[user::class,'contact']);

Route::get('/productdetail/{id}', [user::class,'productdetail']);
Route::post('/addtocart',[user::class,'addtocart']);


Route::get('/cart',[user::class,'cart']);
Route::get('/updatecart/{key}/{qty}',[user::class,'updatecart']);
// ================================
Route::any('/deletecart/{id}',[user::class,'deletecart']);
// =================================

Route::get('/validcode/{code}',[user::class,'validcode']);


Route::get('/admin/contactlist',[admin::class,'contactlist']);

Route::get('/login',[user::class,'login']);
Route::post('/logincheck',[user::class,'logincheck']);
Route::get('/logout', [user::class,'logout']);
Route::get('/registration',[user::class,'registration']);
Route::post('/register',[user::class,'regi']);

Route::get('/sendmail',[user::class,'sendmail']);
Route::get('/forgotpassword',[user::class,'forgotpassword']);
Route::post('/sendlink',[user::class,'sendlink']);
Route::get('/resetlink/{token}',[user::class,'resetlink']);
Route::post('/forpassword',[user::class,'forpassword']);

Route::get('getprice/{id}/{pid}',[user::class,'getprice']);

Route::get('/editprofile',[user::class,'editprofile']);
Route::post('/updateprofile/{id}',[user::class,'updateprofile']);

Route::get('/changepassword',[user::class,'changepassword']);
Route::post('/updatechangepassword',[user::class,'updatechangepassword']);
Route::get('/searchproduct',[user::class,'searchproduct']);
Route::get('/getmfgdate/{id}/{pid}',[user::class,'getmfgdate']);

Route::get('/getexpiredate/{id}/{pid}',[user::class,'getexpiredate']);
Route::get('showcoupon',[user::class,'showcoupon']);
Route::post('/rating',[user::class,'rating']);
Route::post('applyfilter',[user::class,'applyfilter']);
Route::get('/myorder',[user::class,'myorder']);
Route::get('/orderdetail/{id}',[user::class,'orderdetail']);

Route::get('/userinvoice/{id}',[user::class,'userinvoice']);

Route::get('/addtowishlist/{id}',[user::class,'addtowishlist']);
Route::get('/wishlist',[user::class,'wishlist']);
Route::get('deletewishlist/{id}',[user::class,'deletewishlist']);




Route::get('/admin',[admin::class,'login']);
Route::get('/admin/sidebar',[admin::class,'sidebar']);
Route::get('/admin/chart',[admin::class,'chart']);
Route::get('/admin/documentation',[admin::class,'documentation']);
Route::get('/admin/error_404',[admin::class,'error_404']);
Route::get('/admin/error_500',[admin::class,'error_500']);
Route::get('/admin/dashboard',[admin::class,'home']);
Route::post('/admin/logincheck',[admin::class,'logincheck']);
Route::get('/admin/logout', [admin::class,'logout']);





Route::get('/admin/getsubcate/{id}',[admin::class,'getsubcate']);

Route::get('/admin/country',[admin::class,'country']);
Route::post('/admin/insertcountry',[admin::class,'insertcountry']);
Route::get('/admin/state',[admin::class,'state']);
Route::post('/admin/insertstate',[admin::class,'insertstate']);
Route::get('/admin/city',[admin::class,'city']);
Route::post('/admin/insertcity',[admin::class,'insertcity']);
// Route::get('/admin/fetchcity',[admin::class,'fetchcity']);




Route::get('/admin/address',[admin::class,'address']);
Route::get('/admin/getstate/{coun_id}',[admin::class,'getstate']);
Route::get('/admin/getcity/{s_id}',[admin::class,'getcity']);

Route::post('/admin/insertaddress',[admin::class,'insertaddress']);


Route::get('/admin/userlist',[admin::class,'userlist']);
Route::get('/admin/review',[admin::class,'review']);

Route::get('/admin/product',[admin::class,'product']);
Route::post('/admin/insertproduct',[admin::class,'insertproduct']);
Route::get('/admin/fetchproduct/{id}',[admin::class,'fetchproduct']);
Route::get('/admin/deleteproduct/{id}',[admin::class,'deleteproduct']);
Route::post('/admin/updateproduct/{id}',[admin::class,'updateproduct']);

Route::get('/admin/category',[admin::class,'category']);
Route::post('/admin/insertcategory',[admin::class,'insertcategory']);
Route::get('/admin/fetchcategory/{id}',[admin::class,'fetchcategory']);
Route::post('/admin/updatecategory/{id}',[admin::class,'updatecategory']);
Route::get('/admin/deletecategory/{id}',[admin::class,'deletecategory']);

Route::get('/admin/subcategory',[admin::class,'subcategory']);
Route::post('/admin/insertsubcategory',[admin::class,'insertsubcategory']);
Route::get('/admin/fetchsubcategory/{id}',[admin::class,'fetchsubcategory']);
Route::get('/admin/deletesubcategory/{id}',[admin::class,'deletesubcategory']);
Route::post('/admin/updatesubcategory/{id}',[admin::class,'updatesubcategory']);


Route::get('/admin/size',[admin::class,'size']);
Route::post('/admin/insertsize',[admin::class,'insertsize']);
Route::get('/admin/fetchsize/{id}',[admin::class,'fetchsize']);
Route::get('/admin/deletesize/{id}',[admin::class,'deletesize']);
Route::post('/admin/updatesize/{id}',[admin::class,'updatesize']);


Route::get('/admin/brand',[admin::class,'brand']);
Route::post('/admin/insertbrand',[admin::class,'insertbrand']);
Route::get('/admin/fetchbrand/{id}',[admin::class,'fetchbrand']);
Route::get('/admin/deletebrand/{id}',[admin::class,'deletebrand']);
Route::post('/admin/updatebrand/{id}',[admin::class,'updatebrand']);


Route::get('/admin/flavour',[admin::class,'flavour']);
Route::post('/admin/insertflavour',[admin::class,'insertflavour']);
Route::get('/admin/fetchflavour/{id}',[admin::class,'fetchflavour']);
Route::get('/admin/deleteflavour/{id}',[admin::class,'deleteflavour']);
Route::post('/admin/updateflavour/{id}',[admin::class,'updateflavour']);


Route::get('/admin/packtype',[admin::class,'packtype']);
Route::post('/admin/insertpacktype',[admin::class,'insertpacktype']);
Route::get('/admin/fetchpacktype/{id}',[admin::class,'fetchpacktype']);
Route::get('/admin/deletepacktype/{id}',[admin::class,'deletepacktype']);
Route::post('/admin/updatepacktype/{id}',[admin::class,'updatepacktype']);

Route::get('/admin/editprofile',[admin::class,'editprofile']);
Route::post('/admin/updateprofile/{id}',[admin::class,'updateprofile']);

Route::get('/admin/attribute/{id}',[admin::class,'attribute']);

Route::post('/admin/insertattribute',[admin::class,'insertattribute']);

Route::get('/admin/addadmin',[admin::class,'addadmin']);
Route::post('/admin/newadmin',[admin::class,'newadmin']);

Route::get('/admin/promocode',[admin::class,'promocode']);
Route::get('/admin/checkvalidcode/{code}',[admin::class,'checkvalidcode']);
Route::post('/admin/inspromocode',[admin::class,'inspromocode']);
Route::get('/admin/deletepromocode/{id}',[admin::class,'deletepromocode']);
Route::get('/admin/fetchpromocode/{id}',[admin::class,'fetchpromocode']);
Route::post('/admin/updatepromocode/{id}',[admin::class,'updatepromocode']);



Route::get('admin/forgotpassword',[admin::class,'forgotpassword']);
Route::post('admin/sendlink',[admin::class,'sendlink']);
Route::get('admin/resetlink/{token}',[admin::class,'resetlink']);
Route::post('admin/forpassword',[admin::class,'forpassword']);

Route::get('/admin/changepassword',[admin::class,'changepassword']);
Route::post('/admin/updatechangepassword',[admin::class,'updatechangepassword']);

Route::get('/admin/order',[admin::class,'order']);
Route::get('/admin/invoice/{id}',[admin::class,'invoice']);

Route::get('/admin/chandeorderstatus/{id}/{status}',[admin::class,'chandeorderstatus']);

Route::post('/admin/assigndeliveryboy',[admin::class,'assigndeliveryboy']);

Route::get('/admin/adddeliveryboy',[admin::class,'adddeliveryboy']);
Route::post('/admin/newdeliveryboy',[admin::class,'newdeliveryboy']);
Route::get('/admin/deletedeliveryboy/{id}',[admin::class,'deletedeliveryboy']);

Route::get('admin/deleteimage/{id}',[admin::class,'deleteimage']);
Route::post('admin/addimage/{id}',[admin::class,'addimage']);



Route::get('/deliveryboy/dashboard',[deliveryboy::class,'home']);
Route::get('/deliveryboy',[deliveryboy::class,'login']);
Route::post('/deliveryboy/logincheck',[deliveryboy::class,'logincheck']);
Route::get('/deliveryboy/logout', [deliveryboy::class,'logout']);


Route::get('deliveryboy/forgotpassword',[deliveryboy::class,'forgotpassword']);
Route::post('deliveryboy/sendlink',[deliveryboy::class,'sendlink']);
Route::get('deliveryboy/resetlink/{token}',[deliveryboy::class,'resetlink']);
Route::post('deliveryboy/forpassword',[deliveryboy::class,'forpassword']);

Route::get('/deliveryboy/changepassword',[deliveryboy::class,'changepassword']);
Route::post('/deliveryboy/updatechangepassword',[deliveryboy::class,'updatechangepassword']);

Route::get('/deliveryboy/profile',[deliveryboy::class,'profile']);
Route::get('/deliveryboy/orderlist',[deliveryboy::class,'orderlist']);
Route::post('/deliveryboy/updatedeliveryboy/{id}',[deliveryboy::class,'updatedeliveryboy']);
Route::get('/deliveryboy/fetchdeliveryboy/{id}',[deliveryboy::class,'fetchdeliveryboy']);



