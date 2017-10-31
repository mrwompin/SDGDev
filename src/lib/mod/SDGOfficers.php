<?php 

class SDGOfficers
{
	public $html;
	public function __construct()
	{
		$this->html = <<<EOD
	<div id="SDGOfficers">
		<table>
			<th colspan="3"><h2>Officers</h2></th>
			<tr>
				<td><img src="img/advis.png" alt="Advisor"/><p>Advisor Sharon Hoover</p></td>
				<td><img src="img/pres.png" alt="President"/><p>President Devin Brough</p></td>
			</tr>
			<tr>  
				<td><img src="img/open.png" alt="Vice-President"/><p>Vice-President David Sarnor</p></td>
				<td><img src="img/admin.png" alt="Admin"/><p>Administrative Assistant Quinntin Duong</p></td>
			</tr>
			<tr>
				<td><img src="img/web.png"/><p>Web Master Jason Helsel</p></td>
				<td><img src="img/open.png"/><p>Event Coordinator TBD</p></td>
			</tr>
		</table
	</div>
EOD;
	}
}

