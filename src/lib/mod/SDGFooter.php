<?php 

class SDGFooter
{
	public $html;
	public function __construct()
	{
		$this->html = <<<EOD
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
EOD;
	}
}
