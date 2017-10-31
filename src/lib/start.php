<?php 
spl_autoload_register(function($class_name) {
	if (file_exists('lib/css/' . $class_name . '.css')) {
		include 'lib/css/' . $class_name . 'css';
	}elseif (file_exists('lib/mod/' . $class_name . '.php')) {
		include 'lib/mod/' . $class_name . '.php';
	}elseif (file_exists('lib/js/' . $class_name . '.js')) {
		include 'lib/js/' . $class_name . '.php';
	}
});
