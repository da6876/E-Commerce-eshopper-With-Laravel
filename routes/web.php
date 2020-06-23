<?php

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

Route::get('/','HomeController@index');

//Show Category Waise Product
Route::get('/show-product-by-category/{category_name}','HomeController@showProductCategory');
Route::get('/show-product-by-brand/{brand_id}','HomeController@showProductBrand');
Route::get('/show-product/{product_id}','HomeController@showProductSingle');
Route::post('/add-to-card','AddToCardController@addtoCard');
Route::get('/show-card','AddToCardController@showCard');
Route::get('/delete-cart/{rowId}','AddToCardController@deleteCard');
Route::post('/update-card','AddToCardController@updateCard');

//check Out Routes
Route::get('/login-check','CheckoutController@loginCheck');
Route::post('/cutomer-registration','CheckoutController@cutomerRegistration');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-shipping-details','CheckoutController@saveShippingDetails');
Route::get('/checkout','CheckoutController@checkout');

//customer login and logout
Route::post('/customer-login','CheckoutController@customerLogin');
Route::get('/customer-logout','CheckoutController@customerLogOut');



//======================Admin Site=========================================

Route::get('logout','SuperAdminController@logout');
Route::get('admin/login','AdminController@index');
Route::get('admin/dashbord','SuperAdminController@index');
Route::Post('admin-dashbord','AdminController@dashbord');


//catagory All Routs
Route::get('/add-catagory','CatagoryController@index');
Route::get('/all-catagory','CatagoryController@allcatagory');
Route::post('/save-catagory','CatagoryController@savecatagory');
Route::post('/update-catagory/{category_id}','CatagoryController@updatecatagory');
Route::get('/unactive_category/{category_id}','CatagoryController@unactive_category');
Route::get('/active_category/{category_id}','CatagoryController@active_category');
Route::get('/edit_category/{category_id}','CatagoryController@edit_category');
Route::get('/delete_category/{category_id}','CatagoryController@delete_category');

//Brand All Routs
Route::get('/add-brand','BrandController@index');
Route::get('/all-brand','BrandController@allbrand');
Route::post('/save-brand','BrandController@savebrand');
Route::get('/unactive_brand/{brand_id}','BrandController@unactive_brand');
Route::get('/active_brand/{brand_id}','BrandController@active_brand');
Route::get('/delete_brand/{brand_id}','BrandController@delete_brand');
Route::get('/edit_brand/{brand_id}','BrandController@edit_brand');
Route::post('/update-brand/{brand_id}','BrandController@updatebrand');

//Products All Routs
Route::get('/add-product','ProductController@index');
Route::get('/all-product','ProductController@allproduct');
Route::post('/save-product','ProductController@saveproduct');
Route::get('/unactive_product/{product_id}','ProductController@unactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');
Route::get('/delete_product/{product_id}','ProductController@delete_product');
//Route::get('/edit_brand/{brand_id}','BrandController@edit_brand');
//Route::post('/update-brand/{brand_id}','BrandController@updatebrand');

//Slider All Routs
Route::get('/add-slider','SliderController@index');
Route::get('/all-slider','SliderController@allslider');
Route::post('/save-slider','SliderController@saveslider');
Route::get('/unactive_slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active_slider/{slider_id}','SliderController@active_slider');
Route::get('/delete_slider/{slider_id}','SliderController@delete_slider');
//Route::get('/edit_brand/{brand_id}','BrandController@edit_brand');
//Route::post('/update-brand/{brand_id}','BrandController@updatebrand');
