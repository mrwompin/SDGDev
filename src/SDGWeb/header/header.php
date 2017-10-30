<?php namespace SDGWeb\header;

class header
{
	public function __invoke()
	{
		echo "hello from header";
		$file = func_get_arg();
		echo $file;
		echo readfile("html/" . $file . ".html"); 
	}
}
