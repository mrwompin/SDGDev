<?php 

class SDGNav
{
	public $html;
	public function __construct()
	{
		$this->html = <<<EOD
	<div div="SDGNav">
		<a href="index.html"><img src="sytles/grnSDG.png" alt="cat"></a></div>
		<div class="nav-links">
		<a id="nav-index" href="index.html">Home</a>
		<a id="nav-about" href="#">About</a>
		<a id="nav-projects" href="#">Projects</a>
	</div> 
EOD;
	}
}
