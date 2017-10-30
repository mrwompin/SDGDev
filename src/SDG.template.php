#!/usr/bin/env php
<?php
class Template
{
// STYLE CONFIGUATIONS
	private $styles = [
		"css/Style.css",
		"css/SDG-Style.css"
	];

// SCRIPT CONFIGURATIONS
	private $scripts = [
		// LOAD JS SCRIPTS HERE
		"https://use.fontawesome.com/4c9c134f39.js"
	];

// MODULE CONFIGURATIONS
	private $modules = [
		// LOAD MODULES HERE
		
	];

// HTML
	public $html = "";

// __CONSTRUCT() - BUILDS PAGE WHEN CALLED
	public function __construct()
	{
		// $args = func_get_args();
		// $this->modules = $args[modules];
		// $this->styles = $args[styles];
		// $this->scripts = $args[scripts];
		$this->html =  $this->BuildPage();
	}

// BUILDPAGE() - CREATES OPENING HTML WITH CSS AND SCRIPT PAGES
	private function BuildPage()
	{
		$scripts = $this->LoadScripts();
		$styles = $this->LoadStyles();
		$modules = $this->LoadModules();
		$page = <<<PAGE
			<!DOCTYPE html>
			<html lang="en-US">
			<head>
			$scripts
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta charset="UTF-8"/>
			<title>SDG Home</title>
			$styles
			</head>
			<body>
			$modules
			<footer>
			<section id="contact">
			<h4>Contact:&nbsp;</h4>
			<p>President Namey McNamerson&nbsp;</p>
			<p><a href="mailto:MR_prezzz@dudeguy.com">MR_prezzz@dudeguy.com</a></p>
			</section>
			<section id="copyright">
			<p>&copy; 2017 SSC Software Development Guild</p>
			</section>
			</footer>
			</body>
			</html>
PAGE;
		return $page;
	}

// LOADSCRIPTS() - RETURNS JS CALLING ELEMENT
	private function LoadScripts()
	{
		$scripts = $this->scripts;
		$html = null;
		foreach ($scripts as $s) {
			$html .= "<script src='" . $s . "'></script>\n";
		}
		return $html;
	}

// LOADSTYLE() - RETURNS CSS CALLING ELEMENTS
	private function LoadStyles()
	{
		$styles = $this->styles;
		$html = "";
		foreach ($styles as $style) {
			$html .= "<link href='$style' rel='stylesheet' type='text/css'>\n"; 
		}
		return $html;
	}

// LOADMODULES() - RETURNS MODULES IN $MODULES
	private function LoadModules()
	{
		$modules = $this->modules;
		$html = null;
		foreach ($modules as $m){
			$module = new $m;
			$html += $module;
		}
		return $html;
	}

}

$test = new Template();
echo $test->html;
?>

