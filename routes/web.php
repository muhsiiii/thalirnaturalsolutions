<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;


/*****************************************************************************************************/
/********************************************** ADMIN SIDE *******************************************/
/*****************************************************************************************************/

/*********************************** Admin index & login sessions ************************************/
Route::get('/admin', 'AdminController@index');
Route::get('/admin/login', 'AdminController@login');
Route::Post('/admin/login', 'AdminController@check');
Route::get('/admin/logout', 'AdminController@logout');
Route::get('/admin/login/user/{id}', 'AdminController@adminLogin');
Route::get('/admin/login/user/{id}/{type}', 'AdminController@superAdminLogin');
Route::get('/admin/analytics', 'AdminController@analytics');

/**************************************** Admin banners sessions ***************************************/
Route::get('/admin/banners', 'AdminBannerController@listFirst');
Route::get('/admin/banners/first', 'AdminBannerController@listFirst');
Route::get('/admin/banners/second', 'AdminBannerController@listSecond');
Route::get('/admin/banners/third', 'AdminBannerController@listThird');

Route::post('/admin/banners/create', 'AdminBannerController@create');
Route::post('/admin/banners/update', 'AdminBannerController@update');
Route::post('/admin/banners/delete/{type}/{id}', 'AdminBannerController@destroy');

/************************************** Admin Category Controls **************************************/
Route::get('/admin/category', 'AdminCategoryController@index');
Route::post('/admin/category/create', 'AdminCategoryController@create');
Route::post('/admin/category/update', 'AdminCategoryController@update');
Route::post('/admin/category/delete/{id}', 'AdminCategoryController@destroy');

/************************************** Admin SubCategory Controls **************************************/
Route::get('/admin/subcategory', 'AdminCategoryController@subCategory');
Route::post('/admin/subcategory/create', 'AdminCategoryController@createSubCategory');
Route::post('/admin/subcategory/update', 'AdminCategoryController@updateSubCategory');
Route::post('/admin/subcategory/delete/{id}', 'AdminCategoryController@destroySubCategory');

/*************************************** Admin User Controls *****************************************/
Route::resource('/admin/products', 'AdminProductsController');
Route::post('/admin/products/delete/{id}', 'AdminProductsController@destroy');
Route::post('/admin/products/stock', 'AdminProductsController@stockUpdate');
Route::get('/admin/products/units/{id}', 'AdminProductsController@unitsList');
Route::post('/admin/products/units/save/{id}', 'AdminProductsController@unitSave');
Route::post('/admin/products/units/update/{id}', 'AdminProductsController@unitUpdate');
Route::post('/admin/products/units/delete/{id}', 'AdminProductsController@unitDelete');

Route::get('/admin/products/ingredients/{id}', 'AdminProductsController@ingredientsList');
Route::post('/admin/products/ingredients/save/{id}', 'AdminProductsController@ingredientsSave');
Route::post('/admin/products/ingredients/update/{id}', 'AdminProductsController@ingredientsUpdate');
Route::post('/admin/products/ingredients/delete/{id}', 'AdminProductsController@ingredientsDelete');

Route::get('/admin/products/benefits/{id}', 'AdminProductsController@benefitsList');
Route::post('/admin/products/benefits/save/{id}', 'AdminProductsController@benefitsSave');
Route::post('/admin/products/benefits/update/{id}', 'AdminProductsController@benefitsUpdate');
Route::post('/admin/products/benefits/delete/{id}', 'AdminProductsController@benefitsDelete');

Route::get('/admin/products/howtouse/{id}', 'AdminProductsController@howToUseList');
Route::post('/admin/products/howtouse/save/{id}', 'AdminProductsController@howToUseSave');
Route::post('/admin/products/howtouse/update/{id}', 'AdminProductsController@howToUseUpdate');
Route::post('/admin/products/howtouse/delete/{id}', 'AdminProductsController@howToUseDelete');

Route::get('/admin/products/reviews/{id}', 'AdminProductsController@reviewsList');
Route::post('/admin/products/reviews/{id}/create', 'AdminProductsController@reviewsSave');
Route::post('/admin/products/reviews/update/{id}', 'AdminProductsController@reviewsUpdate');
Route::post('/admin/products/reviews/delete/{id}', 'AdminProductsController@reviewsDelete');


Route::get('/admin/products/faqs/{id}', 'AdminProductsController@faqList');
Route::post('/admin/products/faqs/save/{id}', 'AdminProductsController@faqSave');
Route::post('/admin/products/faqs/update/{id}', 'AdminProductsController@faqUpdate');
Route::post('/admin/products/faqs/delete/{id}', 'AdminProductsController@faqDelete');

/************************************* Admin Customer Controls ***************************************/
Route::get('/admin/customers', 'AdminCustomerController@index');

/************************************** Admin Orders Controls ****************************************/
Route::get('/admin/orders', 'AdminOrderController@index');
Route::get('/admin/orders/{id}', 'AdminOrderController@view');

/************************************* Admin Customer Controls ***************************************/
Route::get('/admin/notifications', 'AdminNotificationController@index');
Route::post('/admin/notifications/create', 'AdminNotificationController@create');
Route::post('/admin/notifications/delete/{id}', 'AdminNotificationController@destroy');

/************************************* Admin Settings Controls ***************************************/
Route::get('/admin/settings', 'AdminSettingsController@index');
Route::post('/admin/settings/update', 'AdminSettingsController@update');

/************************************* Admin Blog Controls ***************************************/
Route::resource('/admin/blogs', 'AdminBlogsController')->name('*','adminblogs');
Route::post('/admin/blogs/delete/{id}', 'AdminBlogsController@destroy');
/************************************* Admin Reviews Controls ***************************************/
Route::resource('/admin/reviews', 'AdminReviewsController');
Route::post('/admin/reviews/delete/{id}', 'AdminReviewsController@destroy');


/*****************************************************************************************************/
/********************************************* AJAX SIDE *********************************************/
/*****************************************************************************************************/

Route::post('/ajax/login', 'AjaxController@ajaxLogin');
Route::post('/ajax/create-login', 'AjaxController@ajaxCheckUserForCheckout');


Route::post('/ajax/search/products', 'AjaxController@searchProducts');
Route::get('/ajax/product/status',     'AjaxController@changeProductStatus');
Route::get('/ajax/productunit/status',     'AjaxController@changeProductUnitStatus');
Route::post('/ajax/get/products',     'AjaxController@getCategoryBaisedProducts');


Route::post('/ajax/addtocart',     'AjaxController@addToCart');
Route::post('/ajax/cartcount',     'AjaxController@getCartCount');
Route::post('/ajax/getsizedetails',     'AjaxController@getSizeDetails');
Route::get('/ajax/removecart',     'AjaxController@removeCart');
Route::get('/ajax/getcartcount',     'AjaxController@getCartCount');
Route::get('/ajax/changequantity',     'AjaxController@changeQuantity');

Route::get('/ajax/order/status',     'AjaxController@changeOrderStatus');
Route::get('/ajax/payment/status',     'AjaxController@changePaymentStatus');
Route::post('/ajax/order/cancelorder',     'AjaxController@cancelOrder');

Route::get('/ajax/search/plan',     'AjaxController@getSearchPlans');
Route::get('/ajax/search/shop',     'AjaxController@getSearchShop');
Route::get('/ajax/search/shops',     'AjaxController@getSearchShops');
Route::get('/ajax/search/category',     'AjaxController@getSearchCategory');
Route::get('/ajax/search/shopcategory',     'AjaxController@getSearchShopCategory');

Route::get('/ajax/check/username',     'AjaxController@checkUserName');

Route::get('/ajax/shops/status',     'AjaxController@changeShopStatus');
Route::get('/ajax/deliveryboys/status',     'AjaxController@changeDBStatus');

Route::get('/ajax/shops/getproducts',     'AjaxController@getCategoryBaisedProducts');
Route::get('/ajax/getproduct',     'AjaxController@getProduct');

Route::get('/ajax/loadcartitems',     'AjaxController@loadCartItems');

Route::get('/ajax/getcontact',     'AjaxController@getContact');
Route::get('/ajax/getcartsumtotal',     'AjaxController@getCartSumTotal');

Route::get('/ajax/checkcart',     'AjaxController@checkCart');
Route::get('/ajax/getcustdetails',     'AjaxController@getCustDetails');
Route::get('/ajax/getpincodedetails',     'AjaxController@getPincodeDetails');


Route::get('/ajax/order/changedboy',     'AjaxController@changeDBoy');

Route::get('/ajax/blog/status',     'AjaxController@changeBlogStatus');
Route::post('/ajax/getCart',     'AjaxController@getCart');

Route::get('/ajax/review/status',     'AjaxController@changeReviewStatus');
Route::post('/ajax/setdefaultrating',     'AjaxController@setDefaultRating');


/*****************************************************************************************************/
/********************************************* CLIENT SIDE *******************************************/
/*****************************************************************************************************/

/********************************** Client index & login sessions ************************************/
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', 'HomeController@login');
Route::post('/login', 'HomeController@check');
Route::get('/logout', 'HomeController@logout');
Route::get('/register', 'HomeController@register');
Route::post('/register', 'HomeController@save');
Route::post('/register/update/{id}', 'HomeController@updateProfile');


Route::get('/profile', 'HomeController@profile');
Route::get('/profile/edit', 'HomeController@profileEdit');

Route::post('/update/{id}', 'HomeController@update');

Route::get('/change', 'HomeController@change');
Route::post('/change/{id}', 'HomeController@savePassword');

Route::get('/notifications', 'HomeController@notifications');
Route::get('/myorders', 'HomeController@myorders');
Route::get('/orders', 'HomeController@myorders');
Route::get('/orders/{id}', 'HomeController@viewOrders');

Route::get('/product/{id}', 'HomeController@product');
Route::get('/products', 'HomeController@products');

Route::get('/checkout', 'HomeController@checkout');
Route::get('/guest-checkout', 'HomeController@guestCheckout');

Route::get('/placeorder', 'HomeController@placeOrderCoD');
Route::get('/placeorder/CoD', 'HomeController@placeOrderCoD');


Route::get('/placeorder/Online', 'HomeController@placeOrderOnline');
Route::post('/payresult', 'HomeController@payresult');

Route::get('/payment-success', 'HomeController@paySuccess');
Route::get('/payment-success/{id}', 'HomeController@paySuccess');


Route::get('/about', 'HomeController@about');

Route::get('/terms-conditions', 'HomeController@terms');
Route::get('/privacy-policy', 'HomeController@privacy');
Route::get('/contact', 'HomeController@contact');
Route::get('/return-policy', 'HomeController@return');
Route::get('/shipping-delivery-policy', 'HomeController@shipping');
Route::get('/refund', 'HomeController@refund');

Route::get('/blog', 'HomeController@blog');
Route::get('/contactus', 'HomeController@contactus');
Route::get('/track', 'HomeController@track');

Route::resource('/address', 'CustomerAddressController');
Route::get('/address/delete/{id}', 'CustomerAddressController@destroy');
Route::post('/address/default',     'CustomerAddressController@setDefaultAddress')->name('setDefaultAddress');
Route::post('/cusaddress', 'CustomerAddressController@store');





Route::get('/checkout/placeorder/COD', 'CheckOutController@placeOrderCoD');
Route::get('/checkout/placeorder/online', 'CheckOutController@placeOrderOnline');
Route::get('paySuccess', 'CheckOutController@paySuccess');

Route::post('/review/{productid}', 'HomeController@saveReview');
Route::get('/category/{cid}/{sid}', 'HomeController@showCategoryProducts');
Route::post('/trackorder', 'HomeController@trackOrder');






// Route::post('/placeorder', 'HomeController@placeOrder');
// Route::post('/payment', 'HomeController@payment')->name('payment');


// Route::get('/{search}', 'HomeController@show');
// Route::get('/{search}/{pid}', 'HomeController@show')->where('pid', '[0-9]+');


// Route::get('/payu', 'HomeController@index');






//ALTER TABLE `orders` ADD `paymentid` VARCHAR(32) NULL DEFAULT NULL AFTER `status`;
//ALTER TABLE `orders` DROP `productid`, DROP `unit_name`, DROP `quantity`;
//export ordered_items
//ALTER TABLE `products` ADD `stock_avalible` INT NOT NULL DEFAULT '1' AFTER `subcat_id`;


