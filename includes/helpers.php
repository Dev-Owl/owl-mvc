<?php

function formatTitle($title = ''){
	if($title){
		$title.= ' | ';
	}
	
	$title .= $GLOBALS['defaultTitle'];
	
	return $title;
}

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function createContorller($Name)
{
	$class = $Name."Controller";
	return new $class(); //Create a controller based on the provided string 
}

function userLoggedIn()
{
	return false;//Placeholder
}

?>
