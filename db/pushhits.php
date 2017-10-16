<?php
//include 'db.php'; include 'error.php'; 

//echo " $hostName     $databaseName  $username <br />"; 

 if (!($connection = @ mysql_pconnect($host,$user, $pass))) die("Could not connect to database");
	mysql_select_db("stream", $connection);

	$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
//echo $hostname;
	
	$result = mysql_query ("SELECT CURDATE();", $connection);
	$row = mysql_fetch_row($result);$date = $row[0];
   
	$result = mysql_query ("SELECT CURTIME();", $connection);
	$row = mysql_fetch_row($result);$time = $row[0];

	$str0 = '';
	$str1 = $_SERVER['REMOTE_ADDR'];
	$str1 = $str1 . "-"  .$hostname;
	
	$str2 = $time;
	$str3 = $date;
	$str4 = $_SESSION['pagename'];
//echo " $str1 : $date : $time <br>"; 
	$query = "INSERT INTO ttcompsci.hits (`id`, `ip`, `timein`, `datein`, `pagename`) VALUES ('' ,'$str1','$str2','$str3','$str4');";
//echo "$query";
 $result = @ mysql_query ($query, $connection)  or showerror();			
	mysql_close();

?>
