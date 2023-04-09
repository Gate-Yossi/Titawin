<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyTidewaysXhprof {

	public function enable()
	{
		tideways_xhprof_enable(TIDEWAYS_XHPROF_FLAGS_MEMORY | TIDEWAYS_XHPROF_FLAGS_CPU);
	}

	public function disable()
	{
		$data = tideways_xhprof_disable();
		$filename = '/var/log/xhprof/' . intval(microtime(true)) . mt_rand(1, 10000) . '.xhprof';
		file_put_contents($filename, serialize($data));
	}

}

