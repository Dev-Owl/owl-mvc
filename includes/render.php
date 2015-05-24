<?php

class Renderer
{
	public static function render($view,$vars = array(),$template = "",$memberOnly = false){
		
		//Single view starting with _ partial no login needed
		if(!is_array($view)){
			if( strpos($view, "_") === 0)
			{
				$memberOnly = false;
			}
		}
		if($memberOnly == userLoggedIn() || !$memberOnly)
		{
			if(!empty($template)){
				include "views/template/$template/$template.php";
				$template = new $template();
				$template->renderViews($view,$vars);
			}
			else
			{
				// This will create variables from the array:
				extract($vars);
				if(is_array($view)){
					foreach($view as $k){
						include "views/$k.php";
					}
				}
				else 
				{
					include "views/$template.php";
				}
			}
		}
		else
		{
			throw new Exception('(403) Member only area!');
		}
	}
}

?>
