<?php
   $host = "localhost";
   $database = "stream";
   $user = "streamuser";
   $pass = "yayayayayayaya";
	
  	function clean($input, $maxlength)
 	{
     $input = substr($input, 0, $maxlength);
    $input = EscapeShellCmd($input);
   return ($input);
  }
?>
