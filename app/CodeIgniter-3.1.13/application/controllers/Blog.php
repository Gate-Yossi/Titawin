<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function index()
	{
		sleep(10);
		echo 'Hello World!';
	}

	public function comments() 
	{ 
		echo 'Look at this!';
	} 
}
