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
|	https://codeigniter.com/user_guide/general/routing.html
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

// $route['(:any)'] = "home/index/$1";
$route['default_controller'] = 'admin';


// $route['candidates'] = 'home/candidates';
// $route['candidates/(:any)'] = 'home/candidates/$1';

// $route['candidates'] = 'Candidate/candidates';
// $route['candidates/(:any)'] = 'Candidate/candidates/$1';

$route['change/language'] = 'Language/changeLanguage';


$route['admin'] = 'Admin/loginPage';
$route['admin/login']['post'] = 'Admin/login';
$route['admin/logout'] = 'Admin/logout';
$route['admin/reset/password']['post'] = 'Admin/reset';
$route['admin/reserMyPassword']['post'] = 'Admin/resetPassword';
$route['admin/password/reset/(:any)/(:any)'] = 'Admin/resetPasswordFinal/$1/$2';
$route['admin/set/new/password'] = 'Admin/newPassView';
$route['admin/save/new/password']['post'] = 'Admin/saveNewPassword';

$route['admin/edit/candidates']['post'] = 'Admin/editCandidate';
$route['admin/edit/candidate/answers']['post'] = 'Admin/editCandidateAnswers';
$route['admin/delete/testCandidate']['post'] = 'Admin/deleteTestCandidate';

$route['admin/edit/testCandidatePhoto']['post'] = 'Admin/testCandidatePhoto';
$route['admin/edit/submmitedCandidatePhoto']['post'] = 'Admin/submmitedCandidatePhoto';

$route['admin/deleteSubmittedCandidate']['post'] = 'Admin/deleteSubmittedCandidate';

$route['admin/deleteVoters']['post'] = 'Admin/deleteVoters';

$route['admin/resend/email']['post'] = 'Admin/resendEmail';

$route['admin/circl/chart']['post'] = 'Admin/officeChanger';

$route['admin/mounth/chart']['post'] = 'Admin/getMounthData';

$route['admin/circl/chart/voters']['post'] = 'Admin/circleChartVoters';


$route['complete/survey/choosing']['post'] = 'Candidate/completeSurvey';

$route['share/on']['post'] = 'Candidate/shareOn';

$route['get/map/data']['post'] = 'Admin/getMapData';

$route['admin/editAdminData']['post'] = 'Admin/editAdminData';

$route['admin/edit/adminAvatarPhoto']['post'] = 'Admin/adminAvatarPhoto';

$route['edit/admins/data']['post'] = 'Admin/editAdminsData';

$route['admin/deleteAdminAccount']['post'] = 'Admin/deleteAdminAccount';

$route['admin/update/adminsPhoto']['post'] = 'Admin/adminsPhoto';

$route['admin/addAdmin']['post'] = 'Admin/addAdmin';

$route['admin/adminVerifyCandidate']['post'] = 'Admin/adminVerifyCandidate';


$route['admin/dashboard'] = 'Admin/index';
$route['admin/blog-list'] = 'Admin/blogList';
$route['admin/clean/candidates'] = 'Admin/cleanCandidates';
$route['admin/upload/candidates']['post'] = 'Admin/importCandidates';

$route['admin/edit-video-links'] = 'Admin/editVideoLinksForm';
$route['admin/update-video-links']['post'] = 'Admin/updateVideoLinks';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
