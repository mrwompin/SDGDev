<?php 

class SDGHeader
{
	public $html;
	public function __construct()
	{
		$html =  "<header>";
		$this->html = <<<EOD
			<header>
			<h1>Software</h1><h1>Development</h1><h1>Guild</h1>
			<a href="https://github.com/Demibro/Stark-State-College-SDG-App"><i class="fa fa-github-square" aria-hidden="true"></i></a>
			<a href="https://www.facebook.com/Stark-State-College-Software-Development-Guild-1519047618176936/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
			<a href="https://twitter.com/software_guild"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
			</header>
EOD;
	}
}
