# phpform
<pre>
Original Code by Craig Coleman for php 4 and 5
Modified on 171015 in about 15 minutes.
Warning this is not clean code but it works with php7
Changes will be documented.
I modfied this script from php5 and it's the first 5 to 7 script I modified.

.htaccess code I used:
php_flag display_startup_errors on
php_flag display_errors on
php_flag html_errors on

sql
grant all privileges on stream.* TO 'nameofuser'@'localhost' IDENTIFIED BY 'whitehat'; 


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

grant all privileges on stream.* TO 'nameofuser'@'localhost' IDENTIFIED BY 'whitehat'; 
</pre>
