<?php

class HomeController{
	
	public function index()
	{
		global $globalTheme;
		Renderer::render("home",array('title'=>'Welcome'),$globalTheme);
		
	}
	
	public function devowl()
	{
		global $globalTheme;
		Renderer::render("home",array('title'=>'Owl Time'),$globalTheme);
		
	}
	
}

?>
