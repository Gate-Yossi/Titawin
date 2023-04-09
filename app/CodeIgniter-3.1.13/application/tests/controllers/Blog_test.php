<?php

class Blog_test extends TestCase
{
	public function test_index()
	{
		$output = $this->request('GET', 'blog/index');
		$this->assertStringContainsString('Hello World!', $output);
	}

}
