<?php 

class Default{


	public function renderViews($views,$vars)
	{
		$template = array("_header");
		extract($vars);
		if( is_array($views))
		{
			foreach ($views as $value) {
				$template[] = $value;
			}
		}
		else
		{
			$template[] = $views;
		}
		$template[] = "_footer";
		Renderer::render($template,$vars);
	}
	
	
}

?>
