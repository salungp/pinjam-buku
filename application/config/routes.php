<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pages';
$route['login'] = 'pages/login';
$route['beranda'] = 'pages/index';
$route['pinjam'] = 'pages/pinjam';
$route['tentang'] = 'pages/tentang';
$route['kontak'] = 'pages/kontak';
$route['logout'] = 'action/logout';
$route['register'] = 'pages/register';
$route['kembalikan/(:any)'] = 'action/kembalikan/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
