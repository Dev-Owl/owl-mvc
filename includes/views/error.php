<?php

header("HTTP/1.0 404 Not Found");
render('_header',array('title'=>'Error'))

?>

<p><?php echo $message?></p>

<p><?php if($debugMode){ echo $trace;}?></p>

<?php render('_footer')?>