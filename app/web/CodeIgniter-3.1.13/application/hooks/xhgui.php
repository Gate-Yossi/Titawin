<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyXhgui {

	public function start()
	{

		include(APPPATH.'config/xhgui.php');
		// Add this block inside some bootstrapper or other "early central point in execution"
		try {

			/**
			 * The constructor will throw an exception if the environment
			 * isn't fit for profiling (extensions missing, other problems)
			 */
			$profiler = new \Xhgui\Profiler\Profiler($xhgui_config);

			// The profiler itself checks whether it should be enabled
			// for request (executes lambda function from config)
			$profiler->start();
		} catch (Exception $e){
			// throw away or log error about profiling instantiation failure
		}
	}

}

