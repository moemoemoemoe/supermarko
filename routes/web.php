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
/////////////////////////// Api Controller //////////////////////
Route::get('api/get_last_invoice/{email}', 'ApiController@get_last_invoice')->name('get_last_invoice');
Route::get('api/get_offers/{sty}', 'ApiController@get_offers')->name('get_offers');
Route::get('api/get_offers_all/{sty}', 'ApiController@get_offers_all')->name('get_offers_all');

Route::get('api/get_savers', 'ApiController@get_savers')->name('get_savers');

Route::get('api/spec_offer/{id}', 'ApiController@spec_offer')->name('spec_offer');
Route::get('api/single_offer/{id}', 'ApiController@single_offer')->name('single_offer');
Route::get('api/single_search/{id}', 'ApiController@single_search')->name('single_search');

Route::get('api/logs', 'ApiController@logs')->name('logs');

Route::get('api/get_subs/', 'ApiController@get_subs')->name('get_subs');



Route::get('api/get_cart/{json}/userid/{user}/{em}/{ad}/{phone}/{tab}/{x}/{y}/{date}/{time}/{cmnt}/{regid}', 'CartController@get_cart')->name('get_cart');
Route::get('customer/save_customer/{name}/{email}/{mobile}/{adress}/{imei}/{x}/{y}/{reg}', 'ApiController@save_customer')->name('save_customer');

// Route::post('api/get_cart/userid/{user}/{em}/{ad}/{phone}/{tab}/{x}/{y}/{date}/{time}/{cmnt}/{regid}', 'CartController@get_cart_post')->name('get_cart_post');



Route::get('api/get_all_cart', 'CartController@get_all_cart')->name('get_all_cart');

////////////////////////////////////////////////route for zone and generics and brandes api

Route::get('api/generics_api/{zone_id}', 'ApiController@generics_api')->name('generics_api');
Route::get('api/items_api/{zone_id}/generic/{generic_id}/{lang}', 'ApiController@items_api')->name('items_api');



///////////////////////////////////////////////////////////driver

Route::get('driver/push/{id}', 'DriverController@push')->name('push');
Route::get('driver/save_driver/{name}/{mobile}/{email}/{pass}/{imei}/{reg}', 'DriverController@save_driver')->name('save_driver');




/////////////////////////////webView

Route::get('webview/orders/{email}', 'WebviewController@orders')->name('orders');

Route::post('webview/confirm_order', 'WebviewController@confirm_order')->name('confirm_order');

Route::get('webview/view_order_by_driver/{inv}', 'WebviewController@view_order_by_driver')->name('view_order_by_driver');

Route::post('webview/check_inv', 'WebviewController@check_inv')->name('check_inv');

Route::get('webview/finish_order/{id}', 'WebviewController@finish_order')->name('finish_order');
Route::get('webview/confirm_order_delivered/{id}', 'WebviewController@confirm_order_delivered')->name('confirm_order_delivered');

Route::get('webview/order_driver_api/{email}', 'WebviewController@order_driver_api')->name('order_driver_api');
Route::get('webview/order_driver_print/{inv}', 'WebviewController@order_driver_print')->name('order_driver_print');









////////////////////////////////
Route::get( 'dw/{filename}', 'ApiController@download');

//////post test
Route::post('testpost/testpost', 'DriverApiController@index')->name('testpost');


///////Excell//

Route::get('data', 'ExcellController@data')->name('data');
Route::get('add_to_fake_item', 'ExcellController@add_to_fake_item')->name('add_to_fake_item');




//////////////////////
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

/////////////////////////// offer Controller //////////////////////

Route::get('admin/add_offer', 'OffersController@add_offer')->name('add_offer')->middleware('auth');
Route::post('admin/add_offer', 'OffersController@add_offer_save')->name('add_offer')->middleware('auth');

Route::get('admin/manage_offer', 'OffersController@manage_offer')->name('manage_offer')->middleware('auth');
Route::get('admin/publish_offer/{id}', 'OffersController@publish_offer')->name('publish_offer')->middleware('auth');
Route::get('admin/view_offer/{id}', 'OffersController@view_offer')->name('view_offer')->middleware('auth');
Route::post('admin/view_offer/{id}', 'OffersController@view_offer_update')->name('view_offer')->middleware('auth');

Route::post('admin/delete_offer', 'OffersController@delete_offer')->name('delete_offer')->middleware('auth');
///////////////////////////////////////////view_cart_offer///////////////
Route::get('admin/view_cart_offer', 'OffersController@view_cart_offer')->name('view_cart_offer')->middleware('auth');
Route::get('admin/view_cart_offer_spec/{invm}', 'OffersController@view_cart_offer_spec')->name('view_cart_offer_spec')->middleware('auth');
Route::post('admin/view_cart_offer_spec/{invm}', 'DriverController@view_cart_offer_spec_push')->name('view_cart_offer_spec')->middleware('auth');
Route::post('admin/invoice_adv_search', ['as' => 'invoice_adv_search', 'uses' => 'OffersController@invoice_adv_search']);
Route::get('admin/view_cart_offer_stat', ['as' => 'view_cart_offer_stat', 'uses' => 'OffersController@view_cart_offer_stat']);




///////////////////////////////////////////Home Structure////////////////////////////////
Route::get('admin/home/structure/room_index', 'RoomController@room_index')->name('room_index')->middleware('auth');
Route::post('admin/home/structure/room_index', 'RoomController@room_index_upload')->name('room_index')->middleware('auth');


Route::get('admin/home/structure/room_index_view/{id}', 'RoomController@room_index_view')->name('room_index_view')->middleware('auth');
Route::post('admin/home/structure/room_index_view/{id}', 'RoomController@room_index_view_save')->name('room_index_view')->middleware('auth');
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////Zone Controller

Route::get('admin/home/structure/zone_index', 'ZoneController@zone_index')->name('zone_index')->middleware('auth');
Route::post('admin/home/structure/zone_index', 'ZoneController@zone_index_save')->name('zone_index')->middleware('auth');

Route::get('admin/home/structure/zone_index_view/{id}', 'ZoneController@zone_index_view')->name('zone_index_view')->middleware('auth');
Route::post('admin/home/structure/zone_index_view/{id}', 'ZoneController@zone_index_view_save')->name('zone_index_view')->middleware('auth');

//////////////////////////////////////////////Generic Controller


Route::get('admin/home/generic_brand/generic_index', 'GenericBrandesController@generic_index')->name('generic_index')->middleware('auth');
Route::post('admin/home/generic_brand/generic_index', 'GenericBrandesController@generic_index_save')->name('generic_index')->middleware('auth');


Route::get('admin/home/structure/generic_index_view/{id}', 'GenericBrandesController@generic_index_view')->name('generic_index_view')->middleware('auth');
Route::post('admin/home/structure/generic_index_view/{id}', 'GenericBrandesController@generic_index_view_save')->name('generic_index_view')->middleware('auth');
Route::get('admin/home/structure/generic_index_view_delete/{id}', 'GenericBrandesController@generic_index_view_delete')->name('generic_index_view_delete')->middleware('auth');



Route::get('admin/home/generic_brand/brande_index', 'GenericBrandesController@brande_index')->name('brande_index')->middleware('auth');
Route::post('admin/home/generic_brand/brande_index', 'GenericBrandesController@brande_index_save')->name('brande_index')->middleware('auth');


Route::get('admin/home/generic_brand/brande_index_view/{id}', 'GenericBrandesController@brande_index_view')->name('brande_index_view')->middleware('auth');
Route::post('admin/home/generic_brand/brande_index_view/{id}', 'GenericBrandesController@brande_index_view_save')->name('brande_index_view')->middleware('auth');

//////////////////////////////////////////////////////////////Item Controlller


Route::get('admin/home/items/item_index', 'ItemController@item_index')->name('item_index')->middleware('auth');

Route::post('admin/home/items/item_index', 'ItemController@item_index_save')->name('item_index')->middleware('auth');

Route::get('admin/home/items/item_manage', 'ItemController@item_manage')->name('item_manage')->middleware('auth');

Route::get('admin/home/items/child_index_view/{id}', 'ItemController@child_index_view')->name('child_index_view')->middleware('auth');

Route::post('admin/home/items/child_index_view/{id}', 'ItemController@child_index_view_add_new')->name('child_index_view')->middleware('auth');

Route::get('admin/home/items/child_index_view_lang/{id}', 'LangController@child_index_view_lang')->name('child_index_view_lang')->middleware('auth');
Route::post('admin/home/items/child_index_view_lang/{id}', 'LangController@child_index_view_lang_save')->name('child_index_view_lang')->middleware('auth');


Route::get('admin/home/items/item_index_view/{id}', 'ItemController@item_index_view')->name('item_index_view')->middleware('auth');

Route::get('admin/home/items/child_index_view_update/{id}', 'ItemController@child_index_view_update')->name('child_index_view_update')->middleware('auth');
Route::get('admin/home/items/child_index_view_delete/{id}', 'ItemController@child_index_view_delete')->name('child_index_view_delete')->middleware('auth');



Route::post('admin/home/items/child_index_view_update/{id}', 'ItemController@child_index_view_update_save')->name('child_index_view_update')->middleware('auth');

Route::get('admin/home/items/item_view_no_child/{id}', 'ItemController@item_view_no_child')->name('item_view_no_child')->middleware('auth');
Route::post('admin/home/items/item_view_no_child/{id}', 'ItemController@item_view_no_child_save')->name('item_view_no_child')->middleware('auth');
Route::get('admin/home/items/item_view_no_child_delete/{id}', 'ItemController@item_view_no_child_delete')->name('item_view_no_child_delete')->middleware('auth');




Route::post('admin/home/items/update_the_item', 'ItemController@update_the_item')->name('update_the_item')->middleware('auth');
Route::post('admin/home/items/search_item', 'ItemController@search_item')->name('search_item')->middleware('auth');






////////////////////////////////////////route for get dynamic ids
Route::post('admin/item/show_zone', 'ShowIdController@show_zone')->name('show_zone')->middleware('auth');
Route::post('admin/item/show_generic', 'ShowIdController@show_generic')->name('show_generic')->middleware('auth');
Route::post('admin/item/show_brande', 'ShowIdController@show_brande')->name('show_brande')->middleware('auth');



//////////////////////////////Demo routes

Route::get('admin/demo/demo_index', 'DemoController@demo_index')->name('demo_index')->middleware('auth');
Route::get('admin/demo/demo_get_generic/{zone_id}', 'DemoController@demo_get_generic')->name('demo_get_generic')->middleware('auth');

Route::get('admin/demo/brande_view_by_generic/{generic_id}', 'DemoController@brande_view_by_generic')->name('brande_view_by_generic')->middleware('auth');

Route::get('admin/demo/item_view_domo/{brand_id}', 'DemoController@item_view_domo')->name('item_view_domo')->middleware('auth');
Route::get('admin/demo/child_view_domo/{item_id}', 'DemoController@child_view_domo')->name('child_view_domo')->middleware('auth');


///////////////////////////////////////Saver controller




Route::get('admin/savers/saver_index', 'ScreenSaverController@saver_index')->name('saver_index')->middleware('auth');
Route::post('admin/savers/saver_index', 'ScreenSaverController@saver_index_save')->name('saver_index')->middleware('auth');
Route::get('admin/savers/saver_index_publish/{id}', 'ScreenSaverController@saver_index_publish')->name('saver_index_publish')->middleware('auth');

Route::get('admin/savers/saver_update/{id}', 'ScreenSaverController@saver_update')->name('saver_update')->middleware('auth');
Route::post('admin/savers/saver_update/{id}', 'ScreenSaverController@saver_update_save')->name('saver_update')->middleware('auth');



////////////////////////////customer and driver controller 

Route::get('admin/customer/customer_index', 'CustomerController@customer_index')->name('customer_index')->middleware('auth');
Route::get('admin/customer/publish_driver/{id}', 'CustomerController@publish_driver')->name('publish_driver')->middleware('auth');


Route::get('admin/customer/get_driver_report/{id}', 'CustomerController@get_driver_report')->name('get_driver_report')->middleware('auth');


/////////////test post

