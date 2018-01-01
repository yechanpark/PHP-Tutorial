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
// path 미지정 상태에서 web application 접속 시 출력 페이지 지정
// http//domain/
$route['default_controller'] = 'welcome';

// 존재하지 않는 페이지에 접속할 시
$route['404_override'] = 'errors/notfound';

$route['translate_uri_dashes'] = FALSE;
$route['testcontroller/(:num)'] = "testcontroller/get/$1";
$route['post/(:num)'] = "testcontroller/get/$1";
// URI routes 참조 : https://opentutorials.org/course/697/3838
// 이 코드를 추가하면
// $route['testcontroller/(:num)'] = "testcontroller/get/$1";

// 다음 URL은
// http//domain/index.php/testcontroller/10
// http//domain/index.php/post/10

// 다음 URL(적용 전)과 동일하게 작동한다
// http//domain/index.php/testcontroller/get/10


$route['testcontroller/([a-z]+)/([a-z]+)/(\d+)'] = "$1/$2/$3";
// [a-z] -> a~z까지 하나라도 존재한다면 이 패턴에 일치,
// + -> 수량 한정자, 하나라도 한 개 이상이라면
// ex url에 100이 있다면 a-z까지 포함이 안되므로 패턴에 일치하지 않음
// ex url에 a가 있다면 a-z까지 포함이 되므로 패턴에 일치함
// () -> 백 레퍼런싱, ()는 순서대로 $1, $2, $3에 해당
// $1은 컨트롤러 클래스, $2는 메서드, $3은 인자