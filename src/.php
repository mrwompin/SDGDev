#!/usr/bin/env php
<?php
require_once('./lib/start.php');
$template = new Template;
$template();

class Template
{
// PROPERTIES
	private $scripts;
	private $name;
	private $modules;
	private $styles;
	private $html;

// __INVOKE() - ENTRY POINT FOR TEMPLATE
	public function __invoke()
	{
		$filename = basename(__FILE__, '.php');
		if ($filename == '.php') {
			$filename = null;
		}
		echo $filename;
		$json = file_get_contents('json/' . $filename . '.json');
		$config = json_decode($json,true);
		$this->name = $config['Name'];
		$this->scripts = $config['Scripts'];
		$this->modules = $config['Modules'];
		$this->styles = $config['Styles'];
		$this->html =  $this->BuildPage();

		file_put_contents('./html/'. $filename . '.html',$this->html);
		//file_put_contents('../app/html/' . $this->filename . 'test.html', $this->html);
	}

// BUILDPAGE() - CREATES OPENING HTML WITH CSS AND SCRIPT PAGES
	private function BuildPage()
	{
		$scripts = $this->LoadScripts();
		$styles = $this->LoadStyles();
		$modules = $this->LoadModules();
		$name = $this->name;
		$page = <<<PAGE
<!DOCTYPE html>
	<html lang="en-US">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8"/>
		<title>SDG $name</title>
		$scripts
		$styles
	</head>
	<body>
$modules
<!--CLOSING TAGS-->
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
		//$mod = "\n";
		$mod = "";
		$modules = $this->modules;
		foreach ($modules as $m) {
			$mod = new $m;
			$html .= "<!--" . $m . "-->\n";
			$html .= $mod->html . "\n";
		}
		return $html;
	}
}
?>

