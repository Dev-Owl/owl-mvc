<?php

class HomeController{
	
	public function index()
	{
		
		Renderer::render("home",array('title'=>'Welcome'),"DefaultTemplate");
		
	}
	
	public function devowl()
	{
		Renderer::render("home",array('title'=>'Owl Time'),"DefaultTemplate");
		
	}
	
}

?>
