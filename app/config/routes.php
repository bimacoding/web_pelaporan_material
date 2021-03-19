<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 				= 'main'; 
$route['siteman']  	 						= 'admin/siteman';
$route['dashboard']							= 'admin/siteman/home';
$route['log/indeks']  	 					= 'siteman/log';
$route['siteman/(:any)']  	 				= 'admin/siteman/$1';
$route['siteman/(:any)/(:any)']  	 		= 'admin/siteman/$1/$2';

$route['users/indeks']  	 				= 'admin/users/indeks';
$route['users/(:any)']  	 				= 'admin/users/$1';
$route['users/(:any)/(:num)']  	 			= 'admin/users/$1/$2';

$route['kategori/indeks']  	 				= 'admin/kategori/indeks';
$route['kategori/(:any)']  	 				= 'admin/kategori/$1';
$route['kategori/(:any)/(:any)']  	    	= 'admin/kategori/$1/$2';

$route['source/indeks']  	 				= 'admin/source/indeks';
$route['source/(:any)']  	 				= 'admin/source/$1';
$route['source/(:any)/(:any)']  	    	= 'admin/source/$1/$2';

$route['supplier/indeks']  	 				= 'admin/supplier/indeks';
$route['supplier/(:any)']  	 				= 'admin/supplier/$1';
$route['supplier/(:any)/(:any)']  	    	= 'admin/supplier/$1/$2';

$route['spk/indeks']  	 				= 'admin/spk/indeks';
$route['spk/(:any)']  	 				= 'admin/spk/$1';
$route['spk/(:any)/(:any)']  	    	= 'admin/spk/$1/$2';

$route['material_spesification']  	 						= 'admin/material_spesification/index';
$route['material_spesification/indeks']  	 				= 'admin/material_spesification/indeks';
$route['material_spesification/(:any)']  	 				= 'admin/material_spesification/$1';
$route['material_spesification/(:any)/(:any)']  	    	= 'admin/material_spesification/$1/$2';

$route['menu/indeks']  	 					= 'admin/menu/indeks';
$route['menu/(:any)']  	 					= 'admin/menu/$1';
$route['menu/(:any)/(:any)']  	    		= 'admin/menu/$1/$2';

$route['level/indeks']  	 				= 'admin/level/indeks';
$route['level/(:any)']  	 				= 'admin/level/$1';
$route['level/(:any)/(:num)']  	 			= 'admin/level/$1/$2';
$route['role/indeks']  	 					= 'admin/role/indeks';
$route['role/(:any)']  	 					= 'admin/role/$1';
$route['role/(:any)/(:num)']  	 			= 'admin/role/$1/$2';
$route['password']  	 					= 'admin/users/change_password';

$route['404_override'] 					= '';
$route['translate_uri_dashes'] 			= FALSE;
