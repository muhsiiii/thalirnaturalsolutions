 <?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/***************************************************************************************************/
/******************************************** COMMON SIDE ******************************************/
/***************************************************************************************************/


Route::get('/getpincodedetails',     'ApiController@getPincodeDetails');


/***************************************************************************************************/
/****************************************** CUSTOMER SIDE ******************************************/
/***************************************************************************************************/

Route::get('/check/number',     'ApiController@checkUserNumber');

Route::post('/login',     'ApiController@login');
Route::post('/check',     'ApiController@check');
Route::post('/register',     'ApiController@register');
Route::post('/update/{id}',     'ApiController@update');
Route::post('/home',     'ApiController@home');
Route::post('/products',     'ApiController@products');
Route::post('/product/{id}',     'ApiController@product');

Route::post('/addtocart',     'ApiController@addToCart');
Route::post('/removecart',     'ApiController@removeCart');
Route::post('/changequantity',     'ApiController@changeQuantity');
Route::post('/cartcount',     'ApiController@getCartCount');
Route::post('/getcartsumtotal',     'ApiController@getCartSumTotal');
Route::post('/getcart',     'ApiController@getCart');
Route::post('/clearcart',     'ApiController@clearCart');
Route::get('/search/subcategory',     'ApiController@searchSubcategory');

Route::post('/placeorder',     'ApiController@placeorder');



Route::post('/orders',     'ApiController@orders');
Route::post('/order',     'ApiController@order');
Route::post('/order/status/{id}',     'ApiController@changeOrderStatus');
Route::post('/payment/status/{id}',     'ApiController@changePaymentStatus');
Route::post('/order/update/{id}',     'ApiController@orderUpdate');

Route::post('/notifications',     'ApiController@notifications');
