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
// http//domain/
$route['default_controller'] = 'welcome';

$route['404_override'] = 'errors/notfound';

$route['translate_uri_dashes'] = FALSE;
$route['testcontroller/(:num)'] = "testcontroller/get/$1";
$route['post/(:num)'] = "testcontroller/get/$1";
// URI routes 참고 : https://opentutorials.org/course/697/3838
// $route['testcontroller/(:num)'] = "testcontroller/get/$1";

// 입력 URL
// http//domain/index.php/testcontroller/10
// http//domain/index.php/post/10

// 매핑되는 URL
// http//domain/index.php/testcontroller/get/10


$route['testcontroller/([a-z]+)/([a-z]+)/(\d+)'] = "$1/$2/$3";
// [a-z] -> a~z가 포함된 문자열 포함시 해당된다.
// + -> 정규표현식에서 1개 이상의 문자를 의미한다.