<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'default/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dashboard'] = 'admin/dashboard';

$route['monthly-summary-report'] = 'admin/dashboard/column_graph_monthly';
$route['daily-summary-report'] = 'admin/dashboard/daily';
$route['yearly-summary-report'] = 'admin/dashboard/column_graph_yearly';

//Login Route
$route['login'] = 'default/login';
$route['logout'] = 'default/login/logout';

//User Route
$route['create'] = 'admin/User';
$route['update-profile'] = 'admin/User/edit';
$route['profile/(:any)'] = 'admin/User/myProfile';
$route['user-list'] = 'admin/User/user_list';
$route['activate/(:num)'] = 'admin/User/activate';
$route['suspend/(:num)'] = 'admin/User/deactivate';

//Inventory Route
$route['inventory/wholesale'] = 'admin/Inventory';
$route['inventory/edit/(:num)'] = 'admin/Inventory/edit/$1';
$route['inventory/update/(:num)'] = 'admin/Inventory/update/$1';

//Purchase Order Route
$route['purchase-order'] = 'admin/Purchase_order';
$route['purchase-order/add'] = 'admin/Purchase_order/create';
$route['purchase-order/display-items-category'] = 'admin/Purchase_order/all_items_category';
$route['purchase-order/display-list'] = 'admin/Purchase_order/displayList';
$route['purchase-list'] = 'admin/Purchase_order/list';
$route['purchase-list/edit/(:num)'] = 'admin/Purchase_order/edit/$1';
$route['recieved/(:num)'] = 'admin/Purchase_order/recievedItem/$1';
$route['defective/(:num)'] = 'admin/Purchase_order/defectiveItem/$1';
$route['purchase-list/update/(:num)'] = 'admin/Purchase_order/update/$1';
$route['dateScript'] = 'admin/Purchase_order/datepicker';
$route['sell/(:num)'] = 'admin/Purchase_order/sell/$1';
$route['not-sell/(:num)'] = 'admin/Purchase_order/notsell/$1';
$route['remove/(:num)'] = 'admin/Purchase_order/removeItem/$1';

//Product List
$route['product-list'] = 'admin/Product';
$route['create-products'] = 'admin/Product/createProducts';
$route['update-products/(:num)'] = 'admin/Product/updateProducts/$1';

//Retail
$route['inventory/retail'] = 'admin/Retail';
$route['retail/form'] = 'admin/Retail/add';
$route['retail/add'] = 'admin/Retail/create';
$route['retail/remove/(:num)'] = 'admin/Retail/removeItem/$1';
$route['retail/edit/(:num)'] = 'admin/Retail/edit/$1';
$route['retail/update/(:num)'] = 'admin/Retail/update/$1';

//Customer Route
$route['customer'] = 'default/Customer';
$route['auto-complete'] = 'default/Customer/getProduct';
$route['wholesale'] = 'default/Customer/getWholePrize';
$route['prize'] = 'default/Customer/getRetailPrize';
$route['customer/transaction'] = 'default/Customer/transaction';
$route['stocks/retail'] = 'default/Customer/retail';
$route['stocks/wholesale'] = 'default/Customer/wholesale';