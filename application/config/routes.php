<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['users'] = 'users/index';
$route['users/(:any)'] = 'users/view/$1';

$route['admin'] = 'admin/index';
$route['admin/(:any)'] = 'admin/index/$1';
// $route['admin/(:any)'] = 'admin/users/view/$1';

$route['admin/create'] = 'admin/create';
$route['admin/article/new'] = 'article/new_article';
// $route['admin/article/add'] = 'article/add_article';
$route['admin/article/edit/(:num)'] = 'article/edit_article/$1';
$route['admin/article/update/(:num)'] = 'article/update_article/$1';
$route['admin/volume/update/(:num)'] = 'admin/update_volume/$1';
$route['admin/article/delete/(:num)'] = 'article/delete_article/$1';
$route['admin/article/(:num)'] = 'article/view_article/$1';
$route['admin/article/download/(:any)'] = 'article/download/$1';

$route['archived/(:num)'] = 'archives/index/$1';

$route['admin/author/update/(:num)'] = 'author/update_author/$1';
$route['admin/author/edit/(:num)'] = 'admin/edit_author/$1';


$route['admin/volume/(:num)'] = 'admin/view_volume/$1';
$route['admin/volumes'] = 'admin/volumes';


$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;