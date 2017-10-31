#!/usr/bin/env php
<?php
require_once('./lib/start.php');
$template = new Template;
$template();

class Template
{
	public function __invoke()
	{
		$filename = basename(__FILE__, '.php');
		if ($filename == '.php') {
			$filename = null;
		}
		echo $filename;
		$json = file_get_contents('json/' . $filename . '.json');
		$config = json_decode($json,true);
		$name = $config['Name'];
		$scripts = $config['Scripts'];
		$modules = $config['Modules'];
		$styles = $config['Styles'];
		$html =  $this->BuildPage();

		file_put_contents('./html/'. $filename . '.html',$this->html);
		//file_put_contents('../app/html/' . $this->filename . 'test.html', $this->html);
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

// LOADMODULES() - RETURNS MODULES
	private function LoadModules()
	{
		$html = "";
		$mod = "\n";
		$modules = $this->modules;
		foreach ($modules as $m) {
			$mod = new $m;
			$html .= $mod->html . "\n";
		}
		return $html;
	}
}
?>

