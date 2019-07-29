<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function is_logged_in()
{
	$CI = get_instance();
	if (empty($CI->session->userdata('logged_in')))
	{
		redirect('login');
		exit;
	}
}

function is_user()
{
	$CI = get_instance();
	if ( ! empty($CI->session->userdata('email')))
	{
		return $CI->session->userdata('email');
	}
	return null;
}