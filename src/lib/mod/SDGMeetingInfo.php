<?php 

class SDGMeetingInfo
{
	public $html;
	public function __construct()
	{
		$this->html = <<<EOD
	<div id="SDGMeetingInfo">
		<h3>Meetings are Tuesday from <time>4:00pm to 5:00pm</time>
		</h3>
		<p>
			If you would like to join but can't make it to the meetings contact the project manager at <a href="mailto:MR/MRS_Manager@dudeguy.com">MR/MRS_Manager@dudeguy.com</a> to see what you can do to help on our next project!
		</p>
	</div>
EOD;
	}
}
