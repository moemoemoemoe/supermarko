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

//////////////cleanfixapi

Route::get('api/cleanfix/api/main_cat', 'CleanFixControllerApi@main_cat')->name('main_cat');

Route::get('api/cleanfix/api/main_second/{id}', 'CleanFixControllerApi@main_second')->name('main_second');

Route::get('api/cleanfix/api/main_childs/{id}', 'CleanFixControllerApi@main_childs')->name('main_childs');





Route::get('api/cleanfix/api/webviewchilds/{id}', 'CleanFixControllerApi@webviewchilds')->name('webviewchilds');


//////////////////////////save random brande

Route::get('api/add_brande_to_subs', 'DemoController@add_brande_to_subs')->name('add_brande_to_subs');


//////////////////////gps tracking

Route::get('gps/gps_save/{email}/{lat}/{long}/{adress}', 'GpsController@save_tracking')->name('gps_save');
Route::get('gps/create_xml/', 'GpsController@create_xml')->name('create_xml');

Route::get('gps/view_map/{email}', 'GpsController@view_map')->name('view_map');

Route::get('gps/driver_target', 'GpsController@driver_target')->name('driver_target');


Route::get('gps/view_map_target', 'GpsController@view_map_target')->name('view_map_target');



/////////////////////////// Api Controller //////////////////////

Route::get('api/search_keyword/{keyword}', 'ApiController@search_keyword')->name('search_keyword');


Route::get('api/get_last_invoice/{email}', 'ApiController@get_last_invoice')->name('get_last_invoice');
Route::get('api/get_offers/{sty}', 'ApiController@get_offers')->name('get_offers');
Route::get('api/get_offers_all/{sty}', 'ApiController@get_offers_all')->name('get_offers_all');

Route::get('api/get_savers', 'ApiController@get_savers')->name('get_savers');

Route::get('api/spec_offer/{id}', 'ApiController@spec_offer')->name('spec_offer');
Route::get('api/single_offer/{id}', 'ApiController@single_offer')->name('single_offer');
Route::get('api/single_search/{id}', 'ApiController@single_search')->name('single_search');

Route::get('api/logs', 'ApiController@logs')->name('logs');

Route::get('api/get_subs/', 'ApiController@get_subs')->name('get_subs');
Route::get('api/get_subs_twenty/', 'ApiController@get_subs_twenty')->name('get_subs_twenty');




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

Route::get('webview/accept_order_from_delivery/{id}', 'WebviewController@accept_order_from_delivery')->name('accept_order_from_delivery');



Route::get('webview/order_driver_api/{email}', 'WebviewController@order_driver_api')->name('order_driver_api');
Route::get('webview/order_driver_print/{inv}', 'WebviewController@order_driver_print')->name('order_driver_print');

/////////////////////shchedule api



Route::get('api/saver/schedule', 'ScheduleSaverController@all_schedule')->name('all_schedule_saver');




////////////////////////////////
Route::get( 'dw/{filename}', 'ApiController@download');

//////post test
Route::post('testpost/testpost', 'DriverApiController@index')->name('testpost');


///////Excell//

Route::get('data', 'ExcellController@data')->name('data');
Route::get('add_to_fake_item', 'ExcellController@add_to_fake_item')->name('add_to_fake_item');

Route::get('dataold', 'ExcellController@olddata')->name('olddata');


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

Route::post('admin/update_qty', ['as' => 'update_qty', 'uses' => 'OffersController@update_qty']);
Route::post('admin/delete_cart_user', ['as' => 'delete_cart_user', 'uses' => 'OffersController@delete_cart_user']);






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



///////////////////schedulecontrollersaver


Route::get('admin/schedule/schedulesaver', 'ScheduleSaverController@schedulesaver')->name('schedulesaver')->middleware('auth');
Route::post('admin/schedule/schedulesaver', 'ScheduleSaverController@schedulesaver_save')->name('schedulesaver')->middleware('auth');

Route::get('admin/schedule/delete_schedul_view/{id}', 'ScheduleSaverController@delete_schedul_view')->name('delete_schedul_view')->middleware('auth');

/////////////////////////fix&clean

Route::get('admin/fixclean/fc_main_categories', 'FixCleanController@main_index')->name('fc_main_categories')->middleware('auth');
Route::post('admin/fixclean/fc_main_categories', 'FixCleanController@main_index_save')->name('fc_main_categories')->middleware('auth');
Route::get('admin/fixclean/publish_maincat/{id}', 'FixCleanController@publish_maincat')->name('publish_maincat')->middleware('auth');
Route::get('admin/fixclean/view_main/{id}', 'FixCleanController@view_main')->name('view_main')->middleware('auth');
Route::post('admin/fixclean/view_main/{id}', 'FixCleanController@view_main_save')->name('view_main')->middleware('auth');


Route::get('admin/fixclean/fc_categories', 'FixCleanController@fc_categories_index')->name('fc_categories')->middleware('auth');
Route::post('admin/fixclean/fc_categories', 'FixCleanController@fc_categories_index_save')->name('fc_categories')->middleware('auth');
Route::get('admin/fixclean/delete_category/{id}', 'FixCleanController@delete_category')->name('delete_category')->middleware('auth');
Route::get('admin/fixclean/publish_cat/{id}', 'FixCleanController@publish_cat')->name('publish_cat')->middleware('auth');


Route::get('admin/fixclean/fc_childs', 'FixCleanController@fc_childs_index')->name('fc_childs')->middleware('auth');
Route::post('admin/fixclean/fc_childs', 'FixCleanController@fc_childs_save')->name('fc_childs')->middleware('auth');


Route::get('admin/fixclean/child_edit_customer/{id}', 'FixCleanController@child_edit_customer')->name('child_edit_customer')->middleware('auth');
Route::post('admin/fixclean/child_edit_customer/{id}', 'FixCleanController@child_edit_customer_save')->name('child_edit_customer')->middleware('auth');
Route::get('admin/fixclean/publish_child_customer/{id}', 'FixCleanController@publish_child_customer')->name('publish_child_customer')->middleware('auth');

Route::get('admin/fixclean/child_add_images/{id}', 'FixCleanController@child_add_images')->name('child_add_images')->middleware('auth');
Route::post('admin/fixclean/child_add_images/{id}', 'FixCleanController@child_add_images_save')->name('child_add_images')->middleware('auth');

Route::get('admin/fixclean/publish_images_childs/{id}', 'FixCleanController@publish_images_childs')->name('publish_images_childs')->middleware('auth');
Route::get('admin/fixclean/delete_images_childs/{id}', 'FixCleanController@delete_images_childs')->name('delete_images_childs')->middleware('auth');






