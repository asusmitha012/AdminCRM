<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login';
$route['login'] = 'Login';
$route['signup'] = 'Login/signup';
$route['forgot-password'] = 'Login/reset_pwd';
$route['home'] = 'dashboard';
$route['logout'] = 'Login/logout';
$route['myprofile'] = 'Dashboard/my_profile';

$route['client-list'] = 'client/Client/index';
$route['client/add-client'] = 'client/Client/client_add';
$route['save-client'] = 'client/Client/client_save';
$route['client/edit-client'] = 'client/Client/edit_client';
$route['client/show-client'] = 'client/Client/client_show';
$route['update-client'] = 'client/Client/update_client';

$route['document-upload'] = 'client/Client/client_document';
$route['save-client-document'] = 'client/Client/save_client_document';
$route['client/verify-client'] = 'client/Client/client_document_verify';
$route['verify-client-document'] = 'client/Client/client_document_verification';
$route['verify-user'] = 'client/Client/verify_user';

$route['staff-list'] = 'staff/Staff/index';
$route['staff/add-staff'] = 'staff/Staff/staff_add';
$route['save-staff'] = 'staff/Staff/staff_save';
$route['staff/edit-staff'] = 'staff/Staff/edit_staff';
$route['update-staff'] = 'staff/Staff/update_staff';

$route['mt-demo-account'] = 'mtaccount/Mtaccounts';
$route['mt-live-account'] = 'mtaccount/Mtaccounts/live_accounts';
$route['client-transaction'] = 'transaction/Transaction';
$route['transaction-history'] = 'transaction/Transaction/transaction_history';
$route['successful-transaction'] = 'transaction/Transaction/success_transaction';
$route['pending-transaction'] = 'transaction/Transaction/pending_transaction';
$route['save-transaction'] = 'transaction/Transaction/save_transaction';

$route['pending-deposit-show'] = 'transaction/Transaction/pending_deposit';
$route['pending-withdraw-show'] = 'transaction/Transaction/pending_withdraw';
$route['process-transaction'] = 'transaction/Transaction/process_transaction';
$route['reject-transaction'] = 'transaction/Transaction/reject_transaction';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
