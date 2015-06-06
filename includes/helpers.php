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

function set_default($check,$content){

	return (empty($check)) ? $content:$check;
}

function sprintf2($str='', $vars=array(), $char='%')
{
    if (!$str) return '';
    if (count($vars) > 0)
    {
        foreach ($vars as $k => $v)
        {
            $str = str_replace($char . $k, $v, $str);
        }
    }

    return $str;
}

function FileDownload($path, $speed = null)
{
	
	if (is_file($path) === true)
	{
		$file = fopen($path, 'rb');
		$speed = (isset($speed) === true) ? round($speed * 1024) : 524288;
		print_r($path);
		if (is_resource($file) === true)
		{
			
			
			set_time_limit(0);
			ignore_user_abort(false);

			while (ob_get_level() > 0)
			{
				ob_end_clean();
			}

			header('Expires: 0');
			header('Pragma: public');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Content-Type: application/octet-stream');
			header('Content-Length: ' . sprintf('%u', filesize($path)));
			header('Content-Disposition: attachment; filename="' . basename($path) . '"');
			header('Content-Transfer-Encoding: binary');

			while (feof($file) !== true)
			{
				echo fread($file, $speed);

				while (ob_get_level() > 0)
				{
					ob_end_flush();
				}

				flush();
				sleep(1);
			}

			fclose($file);
		}

		exit();
	}

	return false;
}

?>
