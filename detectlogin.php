<?php
//session_start(); 

if (isset ($_SESSION['c_userid']) && !empty($_SESSION['c_userid'])){
	echo "<p align='right' ><i> Name :  ".$_SESSION['c_fname']." ".$_SESSION['c_lname']." "."Customer No :  ".$_SESSION['c_userid']."</i></p></br>";
}	
//$_SESSION['c_userid'] = $userid;   align='right' 
?>