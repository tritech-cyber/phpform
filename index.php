<?php
	include "db/db.php";
 include "db/error.php"; 
	echo " $hostname     $databasename  $username <br />"; 
?>

<html><head><title> Form Input </title>
<style>
body {margin: 0; padding: 0;
background-color: #ffffff;
color:#996633;
font-family:"Arial","sans-serif";color:#700070;font-size:14px;}
pre{margin: 0; padding: 0;font-family:"Arial","sans-serif";color:#000000;font-size:14px;}


#content{
font-family: Arial, Helvetica, sans-serif;
font-size: 14px;
color: #330099;
background-color:white;	
position:absolute;
left:350px;
top:200px;
}

</style>


</head>

<body>
<div id = "content">
	<svg height="30" width="30"><circle cx="15" cy="15" r="15"  fill="# #966400" /> </svg>
	<a href = "select.php" target = "_blank"> select * from stream.formdata order by id desc;</a>
<svg height="30" width="30"><circle cx="15" cy="15" r="15"  fill="#ff7f00" /> </svg>



<form  method="post">
<svg height="30" width="30"><circle cx="15" cy="15" r="15"  fill="#ff7f00" /> </svg>
&nbsp;	First Name<input type="text" name="name" maxlength="20"> 
<svg height="30" width="30"><circle cx="15" cy="15" r="15"  fill="#ff7f00" /></svg>
&nbsp;  Number<input type="text" name="number" maxlength="10"> 
<button type="submit">Submit</button>
</form>


<?php  
if(empty($_POST['name'])){  $name_input = "Name";  } 
	else {	$name_input = 	$_POST['name'];	}
	
if(empty($_POST['number'])){  $number_input = "Number";  } 
	else {	$number_input = 	$_POST['number'];	}
	
	echo "DEBUG FORM $name_input : $number_input<br /> ";
if ( $name_input != "Name" ){
//sql input	*******************************	
	echo "DEBUG made it past if $hostname $username  <br />"; 		

	if(!($connection = mysqli_connect($hostname,$username, $password))) die ("Counld not connect to database.");
 
	$dbname = "stream";
	mysqli_select_db( $connection,  $databasename);

	$result = mysqli_query ($connection,"SELECT CURDATE();");
	$row = mysqli_fetch_row($result);
	$date = $row[0];
   
	$result = mysqli_query ($connection, "SELECT CURTIME();");
	$row = mysqli_fetch_row($result);
	$time = $row[0];

		$str0 = '';
	$str1 = $_SERVER['REMOTE_ADDR'];
	$str2 = $time;
	$str3 = $date;
	$str4 = $name_input;  
	$str5 =  $number_input;
//echo " $str1 : $date : $time <br>"; 
$query = "insert into stream.formdata (`id`, `ip`, `timein`, `datein`, `name`, `number`) VALUES (NULL ,'$str1','$str2','$str3','$str4','$str5');";
//used this to debugINSERT INTO `formdata` (`id`, `ip`, `timein`, `datein`, `name`, `number`) VALUES (NULL, '12.0.0.1', 'now', 'now', 'test', '101902901');
	echo "$query";
	$result = @ mysqli_query ($connection,$query)  or showerror();
	//	$result = @ mysqli_query ($connection,$query);			
		mysqli_close($connection);

}
?>
<hr />
<pre>
Code to create table with the database stream.		
>use database stream;
CREATE TABLE IF NOT EXISTS `formdata` (
  `id` int(32) NOT NULL auto_increment,
  `ip` varchar(64) NOT NULL,
  `timein` varchar(32) NOT NULL,
  `datein` varchar(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `number` varchar(64) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

Code to set up a user:
grant all privileges on stream.* TO 'nameofuser'@'localhost' IDENTIFIED BY 'whitehat'; 
	</pre>
</div>
</body>
</html>
