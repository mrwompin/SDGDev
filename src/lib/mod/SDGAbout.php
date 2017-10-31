<?php 

class SDGAbout
{
	public $hmtl;
	public function __construct()
	{
		$this->html = <<<EOD
	<div id="SDGAbout">
		<h2>The Guild</h2>
		<p>
			The Software Development Guild is a gathering of student developers who seek to further advance their craft through collaboration. 
		</p>
		<p>
			The Guild serves as a meeting place for students of all backgrounds and understanding who seek to better understand software components and the development cycle. 
		</p>  
	</div>
EOD;
	}
}
