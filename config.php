<?php
  $link=mysql_connect("localhost","root","");
  if(!$link)
	{
		die("Could not connect to MySQL".mysql_error());
	}
 $q= mysql_select_db("crud",$link)or die ("could not open database");
 
?>